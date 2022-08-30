# Vemar API Client

Vemar API client for laravel.

## Requirements

* PHP 8.0 or higher with json extensions.

## Installation

The recommended way to install is through [Composer](http://getcomposer.org).

```bash
composer require patryk-sawicki/vemar-laravel-api
```

## Usage

Add to env:

```php
VEMAR_API_KEY = 'your_api_key'
```

Import class:

```php
use PatrykSawicki\VemarApi\app\Classes\Vemar;
```

### Fabric color

Get fabric colors list.

```php
Vemar::fabricColors()->list(bool $returnJson = false);
```

## Changelog

Changelog is available [here](CHANGELOG.md).
