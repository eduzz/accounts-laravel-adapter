<?php

use Illuminate\Support\Facades\Route;

Route::post(config('eduzz-account.callback.route'), config('eduzz-account.route.controller'));
