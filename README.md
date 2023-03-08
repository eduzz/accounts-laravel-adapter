# Accounts Laravel Adapter
Módulo para utilizar o Eduzz Account com uma aplicação Laravel que utiliza o Jetstream.

## Instalação

Instale o pacote via composer:

```bash
composer require eduzz/accounts-laravel-adapter
```

Você deve publicar e executar as migrations com:

```bash
php artisan vendor:publish --tag="accounts-laravel-adapter-migrations"
php artisan migrate
```

Você deve publicar as configurações com:

```bash
php artisan vendor:publish --tag="accounts-laravel-adapter-config"
```

Este é o conteúdo do arquivo de configuração publicado:

```php
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
    'productionApiUrl' => env('EDUZZ_ACCOUNT_API_URL'),
    'testingApiUrl' => env('EDUZZ_ACCOUNT_TESTING_API_URL'),
];
```

Também importe os estilos css do botão em app.css:

```css
@import "/vendor/eduzz/accounts-laravel-adapter/resources/dist/button.css";
```

Opcionalmente, você pode publicar as view com:

```bash
php artisan vendor:publish --tag="accounts-laravel-adapter-views"
```

## Uso
Na sua view do blade, use:

```blade
<x-eduzz-account-login-button>Login com Eduzz Account</x-eduzz-account-login-button>
```

![Captura de Tela de Login](https://i.imgur.com/ktLd6rk.jpeg)

## Testando

```bash
composer test
```
## Licença

MIT License (MIT).
