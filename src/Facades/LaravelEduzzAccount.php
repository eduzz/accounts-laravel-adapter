<?php

namespace VendorName\Skeleton\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VendorName\Skeleton\Skeleton
 */
class LaravelEduzzAccount extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \EduzzLabs\LaravelEduzzAccount\LaravelEduzzAccount::class;
    }
}
