<?php

use Illuminate\Support\Facades\Storage;
use JeffersonGoncalves\CcpaRequests\Enums\RequestStatus;
use JeffersonGoncalves\CcpaRequests\Enums\RequestType;
use JeffersonGoncalves\CcpaRequests\Facades\CcpaRequests;
use JeffersonGoncalves\CcpaRequests\Models\ConsumerRequest;
use JeffersonGoncalves\Filament\CcpaRequests\CcpaRequestsPlugin;
use JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\ConsumerRequestResource;
use JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\Pages\CreateConsumerRequest;
use JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\Pages\ListConsumerRequests;
use JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\Pages\ViewConsumerRequest;
use JeffersonGoncalves\Filament\CcpaRequests\Tests\Fixtures\TestUser;
use Livewire\Livewire;

beforeEach(function () {
    $this->admin = TestUser::create(['name' => 'Admin', 'email' => 'admin@example.com']);
    $this->subject = TestUser::create(['name' => 'Maria', 'email' => 'maria@example.com']);

    $this->actingAs($this->admin);
});

function verifiedRequest(RequestType $type): ConsumerRequest
{
    return CcpaRequests::verify(CcpaRequests::open($type, test()->subject), test()->subject);
}

it('opens a request with the legal deadline', function () {
    $this->freezeSecond();

    Livewire::test(CreateConsumerRequest::class)
        ->fillForm(['type' => 'know', 'requester_name' => 'Maria', 'requester_email' => 'maria@example.com'])
        ->call('create')
        ->assertHasNoFormErrors();

    $request = ConsumerRequest::sole();

    expect($request->type)->toBe(RequestType::Know)
        ->and($request->status)->toBe(RequestStatus::Pending)
        ->and($request->due_at->equalTo(now()->addDays(45)))->toBeTrue();
});

it('lists requests and filters the overdue ones', function () {
    $overdue = CcpaRequests::open(RequestType::Know);
    $this->travel(46)->days();
    $onTime = CcpaRequests::open(RequestType::Delete);

    Livewire::test(ListConsumerRequests::class)
        ->assertCanSeeTableRecords([$overdue, $onTime])
        ->filterTable('overdue')
        ->assertCanSeeTableRecords([$overdue])
        ->assertCanNotSeeTableRecords([$onTime]);

    expect(ConsumerRequestResource::getNavigationBadge())->toBe('2')
        ->and(ConsumerRequestResource::getNavigationBadgeColor())->toBe('danger');
});

it('verifies the requester and links the consumer', function () {
    $request = CcpaRequests::open(RequestType::Know);

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('fulfil')
        ->callAction('verify', ['subject_type' => TestUser::class, 'subject_id' => $this->subject->getKey()])
        ->assertHasNoActionErrors();

    $request->refresh();

    expect($request->isVerified())->toBeTrue()
        ->and($request->subject?->is($this->subject))->toBeTrue();
});

it('does not verify against an unknown record', function () {
    $request = CcpaRequests::open(RequestType::Know);

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->callAction('verify', ['subject_type' => TestUser::class, 'subject_id' => 999]);

    expect($request->fresh()->isVerified())->toBeFalse();
});

it('fulfils a request to know and offers the export', function () {
    Storage::fake('local');
    $request = verifiedRequest(RequestType::Know);

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->callAction('fulfil')
        ->assertActionVisible('download')
        ->callAction('download')
        ->assertFileDownloaded("request-{$request->getKey()}.json");

    expect($request->fresh()->status)->toBe(RequestStatus::Completed);
    Storage::disk('local')->assertExists("ccpa/requests/request-{$request->getKey()}.json");
});

it('deletes the consumer on a delete request', function () {
    $request = verifiedRequest(RequestType::Delete);

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->callAction('fulfil');

    expect($this->subject->fresh()->name)->toBe('M****')
        ->and($request->fresh()->status)->toBe(RequestStatus::Completed);
});

it('completes manual rights with a response and rejects with a reason', function () {
    $manual = CcpaRequests::open(RequestType::Correct);
    $rejected = CcpaRequests::open(RequestType::Know);

    Livewire::test(ViewConsumerRequest::class, ['record' => $manual->getKey()])
        ->assertActionHidden('fulfil')
        ->callAction('complete', ['response' => 'Address fixed.']);

    Livewire::test(ViewConsumerRequest::class, ['record' => $rejected->getKey()])
        ->callAction('reject', ['reason' => ''])
        ->assertHasActionErrors(['reason' => 'required']);

    Livewire::test(ViewConsumerRequest::class, ['record' => $rejected->getKey()])
        ->callAction('reject', ['reason' => 'Identity not confirmed.']);

    expect($manual->fresh())->status->toBe(RequestStatus::Completed)->response->toBe('Address fixed.')
        ->and($rejected->fresh())->status->toBe(RequestStatus::Rejected)->response->toBe('Identity not confirmed.');

    Livewire::test(ViewConsumerRequest::class, ['record' => $manual->getKey()])
        ->assertActionHidden('verify')
        ->assertActionHidden('complete')
        ->assertActionHidden('reject');
});

it('extends the deadline once by 45 days', function () {
    $this->freezeSecond();
    $request = CcpaRequests::open(RequestType::Know);
    $due = $request->due_at->copy();

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->callAction('extend', ['reason' => 'Records spread over several systems.']);

    expect($request->fresh()->due_at->equalTo($due->addDays(45)))->toBeTrue();

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('extend');
});

it('confirms receipt once', function () {
    $request = CcpaRequests::open(RequestType::Know);

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->callAction('acknowledge');

    expect($request->fresh()->acknowledged_at)->not->toBeNull();

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('acknowledge');
});

it('offers the same actions on the table rows', function () {
    $request = CcpaRequests::open(RequestType::Know);

    Livewire::test(ListConsumerRequests::class)
        ->assertTableActionHidden('fulfil', $request)
        ->callTableAction('reject', $request, ['reason' => 'Duplicate.']);

    expect($request->fresh()->status)->toBe(RequestStatus::Rejected);
});

it('registers the resource with the fluent plugin options', function () {
    $plugin = CcpaRequestsPlugin::get()->navigationGroup('CCPA')->slug('privacy-requests')->subjectModels([TestUser::class]);

    expect(ConsumerRequestResource::getNavigationGroup())->toBe('CCPA')
        ->and(ConsumerRequestResource::getSlug())->toBe('privacy-requests')
        ->and($plugin->getSubjectModels())->toBe([TestUser::class])
        ->and(__('filament-ccpa-requests::filament-ccpa-requests.resource.plural_label'))->toBe('Consumer requests');
});
