<?php

namespace Eduzz\AccountsLaravelAdapter;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AccountsLaravelAdapterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('accounts-laravel-adapter')
            ->hasConfigFile()
            ->hasViews()
            ->hasViewComponent('eduzz-account', Components\LoginButton::class)
            ->hasRoute('web')
            ->hasMigration('add_eduzz_account_id_column_to_users');
    }
}
