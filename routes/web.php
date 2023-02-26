<?php

use Illuminate\Support\Facades\Route;

Route::any(config('eduzz-account.callbackUrl'), config('eduzz-account.routeController'));
Route::view('redirect-eduzz-account', 'eduzz-account::redirect');
