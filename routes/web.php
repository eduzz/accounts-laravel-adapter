<?php

use Illuminate\Support\Facades\Route;

Route::post(config('eduzz-account.callbackRoute'), config('eduzz-account.routeController'));
