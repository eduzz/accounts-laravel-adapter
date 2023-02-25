<?php

namespace EduzzLabs\LaravelEduzzAccount;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelEduzzAccountServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-eduzz-account')
            ->hasConfigFile()
            ->hasViewComponent('eduzz-account', Components\LoginButton::class)
            ->hasRoute('web')
            ->hasMigration('add_eduzz_account_id_column_to_users');
    }
}
