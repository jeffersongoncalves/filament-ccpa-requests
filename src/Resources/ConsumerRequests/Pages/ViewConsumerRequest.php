<?php

namespace JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\Pages;

use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\Filament\CcpaRequests\Actions\RequestActions;
use JeffersonGoncalves\Filament\CcpaRequests\Resources\ConsumerRequests\ConsumerRequestResource;

class ViewConsumerRequest extends ViewRecord
{
    protected static string $resource = ConsumerRequestResource::class;

    protected function getHeaderActions(): array
    {
        return RequestActions::all();
    }
}
