<?php

namespace JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests;

use BackedEnum;
use Filament\Actions\ActionGroup;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use JeffersonGoncalves\CcpaRequests\Models\ConsumerRequest;
use JeffersonGoncalves\Filament\CcpaRequests\Actions\RequestActions;
use JeffersonGoncalves\Filament\CcpaRequests\CcpaRequestsPlugin;
use JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\Pages\CreateConsumerRequest;
use JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\Pages\ListConsumerRequests;
use JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\Pages\ViewConsumerRequest;
use JeffersonGoncalves\Filament\CcpaRequests\Support\Labels;

class ConsumerRequestResource extends Resource
{
    protected static ?string $model = ConsumerRequest::class;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Select::make('type')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.type'))
                    ->options(Labels::types())
                    ->required(),
                TextInput::make('requester_name')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.requester_name'))
                    ->maxLength(255),
                TextInput::make('requester_email')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.requester_email'))
                    ->email()
                    ->maxLength(255),
                Textarea::make('details')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.details')),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('type')
                            ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.type'))
                            ->formatStateUsing(fn (BackedEnum $state): string => Labels::type($state->value)),
                        TextEntry::make('status')
                            ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.status'))
                            ->formatStateUsing(fn (BackedEnum $state): string => Labels::status($state->value))
                            ->badge()
                            ->color(fn (BackedEnum $state): string => Labels::statusColor($state->value)),
                        TextEntry::make('requester_name')
                            ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.requester_name'))
                            ->placeholder('-'),
                        TextEntry::make('requester_email')
                            ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.requester_email'))
                            ->placeholder('-'),
                        TextEntry::make('subject')
                            ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.subject'))
                            ->state(fn (ConsumerRequest $record): ?string => Labels::subject($record))
                            ->placeholder('-'),
                        TextEntry::make('due_at')
                            ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.due_at'))
                            ->dateTime()
                            ->color(fn (ConsumerRequest $record): ?string => static::isOverdue($record) ? 'danger' : null),
                        TextEntry::make('verified_at')
                            ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.verified_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('completed_at')
                            ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.completed_at'))
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('details')
                            ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.details'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('response')
                            ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.response'))
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),
                TextColumn::make('type')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.type'))
                    ->formatStateUsing(fn (BackedEnum $state): string => Labels::type($state->value)),
                TextColumn::make('requester_name')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.requester_name'))
                    ->description(fn (ConsumerRequest $record): ?string => $record->getAttribute('requester_email'))
                    ->searchable(['requester_name', 'requester_email'])
                    ->placeholder('-'),
                TextColumn::make('status')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.status'))
                    ->formatStateUsing(fn (BackedEnum $state): string => Labels::status($state->value))
                    ->badge()
                    ->color(fn (BackedEnum $state): string => Labels::statusColor($state->value)),
                IconColumn::make('verified')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.verified'))
                    ->state(fn (ConsumerRequest $record): bool => $record->isVerified())
                    ->boolean(),
                TextColumn::make('due_at')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.due_at'))
                    ->date()
                    ->sortable()
                    ->color(fn (ConsumerRequest $record): ?string => static::isOverdue($record) ? 'danger' : null),
                TextColumn::make('created_at')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('due_at')
            ->filters([
                SelectFilter::make('status')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.status'))
                    ->options(Labels::statuses()),
                SelectFilter::make('type')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.fields.type'))
                    ->options(Labels::types()),
                Filter::make('overdue')
                    ->label(__('filament-ccpa-requests::filament-ccpa-requests.filters.overdue'))
                    ->query(fn (Builder $query): Builder => $query->scopes('overdue')),
            ])
            ->recordActions([
                ViewAction::make(),
                ActionGroup::make(RequestActions::all()),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListConsumerRequests::route('/'),
            'create' => CreateConsumerRequest::route('/create'),
            'view' => ViewConsumerRequest::route('/{record}'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('filament-ccpa-requests::filament-ccpa-requests.resource.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-ccpa-requests::filament-ccpa-requests.resource.plural_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return CcpaRequestsPlugin::get()->getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        return CcpaRequestsPlugin::get()->getNavigationSort();
    }

    public static function getNavigationIcon(): string|BackedEnum|null
    {
        return CcpaRequestsPlugin::get()->getNavigationIcon();
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return CcpaRequestsPlugin::get()->getSlug();
    }

    public static function getNavigationBadge(): ?string
    {
        $open = ConsumerRequest::query()->scopes('open')->count();

        return $open > 0 ? (string) $open : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return ConsumerRequest::query()->scopes('overdue')->exists() ? 'danger' : 'warning';
    }

    protected static function isOverdue(ConsumerRequest $record): bool
    {
        return $record->isOpen() && $record->due_at->isPast();
    }
}
