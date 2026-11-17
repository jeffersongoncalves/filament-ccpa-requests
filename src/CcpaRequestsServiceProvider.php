<?php

namespace JeffersonGoncalves\Filament\CcpaRequests;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CcpaRequestsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-ccpa-requests')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations();
    }
}
