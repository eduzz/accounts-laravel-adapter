# Laravel Eduzz Account
---
Módulo para utilizar o Eduzz Account com uma aplicação Laravel v8+.

## Instalação

Você pode instalar o pacote via composer:

```bash
composer require eduzz/laravel-eduzz-account
```

Você deve publicar e executar as migrations com:

```bash
php artisan vendor:publish --tag="laravel-eduzz-account-migrations"
php artisan migrate
```

Você pode publicar as configurações com:

```bash
php artisan vendor:publish --tag="laravel-eduzz-account-config"
```

Opcionalmente, você pode publicar as view com:

```bash
php artisan vendor:publish --tag="laravel-eduzz-account-views"
```

## Uso
Na sua view do blade, use:

```php
<x-eduzz-account-button />
```

## Testando

```bash
composer test
```
## Licença

The MIT License (MIT).
