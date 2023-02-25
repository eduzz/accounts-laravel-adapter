<?php

use Illuminate\Support\Facades\Route;

Route::post(config('eduzz-account.callback.route'), LaravelEduzzAccountController::class);
