<?php

use Illuminate\Support\Facades\Route;

Route::post(config('eduzz-account.callbackUrl'), config('eduzz-account.routeController'));
