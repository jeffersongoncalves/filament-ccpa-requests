<?php

namespace JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use JeffersonGoncalves\CcpaRequests\Enums\RequestType;
use JeffersonGoncalves\CcpaRequests\RequestManager;
use JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\ConsumerRequestResource;

class CreateConsumerRequest extends CreateRecord
{
    protected static string $resource = ConsumerRequestResource::class;

    /**
     * Open through the manager: it sets the status, the legal deadline and fires ConsumerRequestOpened.
     *
     * @param  array<string, mixed>  $data
     */
    protected function handleRecordCreation(array $data): Model
    {
        return app(RequestManager::class)->open(RequestType::from($data['type']), null, [
            'name' => $data['requester_name'] ?? null,
            'email' => $data['requester_email'] ?? null,
            'details' => $data['details'] ?? null,
        ]);
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }
}
