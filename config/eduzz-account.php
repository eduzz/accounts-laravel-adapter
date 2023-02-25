<?php

return [

    /**
     * Enable/disable the Eduzz Account button.
     */
    'enabled' => env('EDUZZ_ACCOUNT_ENABLED', true),

    /**
     * Url to get back the results of the login attempt.
     */
    'callbackRoute' => env('EDUZZ_ACCOUNT_POSTBACK_URL', '/eduzzlabs/callback'),

    /**
     * Eduzz credentials of this app.
     */
    'id' => env('EDUZZ_ACCOUNTS_ID'),
    'secret' => env('EDUZZ_ACCOUNTS_SECRET'),

    /**
     * Url to redirect the user after the login.
     */
    'redirect_to' => '/',

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
    'logo' => 'https://i.imgur.com/d8a3ucN.jpeg',

    /**
     * The background image to show in the login page.
     */
    'backgroundImage' => 'https://bellamais.correiodopovo.com.br/image/policy:1.401858:1582807039/Quem-precisa-de-etica-no-marketing-digital.jpg?f=2x1&$p$f=cd658fa&w=2400&$w=d2ad2f2',

    /**
     * Define the button color.
     */
    'buttonColor' => '#000',

    /**
     * Set the Eduzz Account Controller class.
     */
    'routeController' => \EduzzLabs\LaravelEduzzAccount\LaravelEduzzAccountController::class,

    /**
     * The Eduzz Account url API.
     */
    'productionApiUrl' => env('EDUZZ_ACCOUNT_API_URL'),
    'testingApiUrl' => env('EDUZZ_ACCOUNT_TESTING_API_URL'),
];
