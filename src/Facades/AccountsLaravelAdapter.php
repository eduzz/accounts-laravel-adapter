<?php

namespace Eduzz\AccountsLaravelAdapter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VendorName\Skeleton\Skeleton
 */
class AccountsLaravelAdapter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Eduzz\AccountsLaravelAdapter\AccountsLaravelAdapter::class;
    }
}
