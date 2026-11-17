<?php

namespace JeffersonGoncalves\Filament\CcpaRequests;

use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class CcpaRequestsServiceProvider extends BasePackageServiceProvider
{
    public static string $name = 'filament-ccpa-requests';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasTranslations();
    }
}
