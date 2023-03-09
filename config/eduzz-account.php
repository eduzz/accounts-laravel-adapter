<?php

return [

    /**
     * Enable/disable the Eduzz Account button.
     */
    'enabled' => env('EDUZZ_ACCOUNTS_ENABLED', true),

    /**
     * Url to get back the results of the login attempt.
     */
    'callbackUrl' => env('EDUZZ_ACCOUNTS_CALLBACK_URL', '/eduzz/callback/'),

    /**
     * Eduzz credentials of this app.
     */
    'id' => env('EDUZZ_ACCOUNTS_ID'),
    'secret' => env('EDUZZ_ACCOUNTS_SECRET'),

    /**
     * Url to redirect the user after the login.
     */
    'redirect_to' => '/login',

    /**
     * The column name to store the Eduzz Account ID.
     */
    'tableColumn' => 'eduzz_account_id',

    /**
     * Define if the app use Teams.
     */
    'hasTeams' => true,

    /**
     * The app logo to show in the login page.
     */
    'logo' => '',

    /**
     * The background image to show in the login page.
     */
    'backgroundImage' => '',

    /**
     * Define the button color.
     */
    'buttonColor' => '#000',

    /**
     * Set the Eduzz Account Controller class.
     */
    'routeController' => \Eduzz\AccountsLaravelAdapter\AccountsLaravelAdapterController::class,

    /**
     * The Eduzz Account url API.
     */
    'productionApiUrl' => env('EDUZZ_ACCOUNTS_API_URL'),
    'testingApiUrl' => env('EDUZZ_ACCOUNTS_TESTING_API_URL'),
];
