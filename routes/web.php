<?php

use Illuminate\Support\Facades\Route;

Route::get(config('eduzz-account.callbackUrl').'{token}', [config('eduzz-account.routeController')], 'processRequest')->middleware('web');
Route::view('redirect-eduzz-account', 'eduzz-account::redirect')->middleware('web');
