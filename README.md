# Laravel Eduzz Account
Módulo para utilizar o Eduzz Account com uma aplicação Laravel que utiliza o Jetstream.

## Instalação

Você pode instalar o pacote via composer:

```bash
composer require eduzzlabs/laravel-eduzz-account
```

Você deve publicar e executar as migrations com:

```bash
php artisan vendor:publish --tag="eduzz-account-migrations"
php artisan migrate
```

Você deve publicar as configurações com:

```bash
php artisan vendor:publish --tag="eduzz-account-config"
```

Também importe os estilos css do botão em app.css:

```css
@import "/vendor/eduzzlabs/laravel-eduzz-account/resources/dist/button.css";
```

Opcionalmente, você pode publicar as view com:

```bash
php artisan vendor:publish --tag="eduzz-account-views"
```

## Uso
Na sua view do blade, use:

```php
<x-eduzz-account-login-button>Login com Eduzz Account</x-eduzz-account-login-button>
```

## Testando

```bash
composer test
```
## Licença

MIT License (MIT).
