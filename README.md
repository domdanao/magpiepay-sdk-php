# domdanao/magpiepay-sdk-php

Magpie API for QRPh and Disbursement services


## Installation & Usage

### Requirements

PHP 8.1 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), run:

```bash
composer require domdanao/magpiepay-sdk-php
```

### Manual Installation

Download the files and include `autoload.php`:

```

### Laravel Integration

This package includes a Laravel Service Provider for easy integration.

#### Configuration

1.  Add your MagpiePay API key to your `.env` file:

    ```env
    MAGPIEPAY_API_KEY=your_api_key_here
    
    # Optional: Override base URL for local development (defaults to https://api.magpiepay.com)
    # MAGPIEPAY_BASE_URL=http://localhost:8000
    ```

2.  (Optional) Publish the configuration file:

    ```bash
    php artisan vendor:publish --provider="MagpiePay\Laravel\MagpiePayServiceProvider"
    ```

#### Usage

You can inject the API clients directly into your controllers or services. The Service Provider will automatically configure them with your API key.

```php
use MagpiePay\Api\PaymentsApi;

public function index(PaymentsApi $api)
{
    try {
        $payments = $api->listPayments();
        return response()->json($payments);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure HTTP basic authorization: basicAuth
$config = MagpiePay\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// The SDK now defaults to https://api.magpiepay.com
// You can override it for local development if needed:
// $config->setHost('http://localhost:8000');


$apiInstance = new MagpiePay\Api\PaymentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payment_id = 'payment_id_example'; // string
$x_api_key = 'x_api_key_example'; // string
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->getPayment($payment_id, $x_api_key, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentsApi->getPayment: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.magpiepay.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*PaymentsApi* | [**getPayment**](docs/Api/PaymentsApi.md#getpayment) | **GET** /v1/payments/{payment_id} | Get payment
*PaymentsApi* | [**listPayments**](docs/Api/PaymentsApi.md#listpayments) | **GET** /v1/payments/ | List payments
*PayoutsApi* | [**createPayout**](docs/Api/PayoutsApi.md#createpayout) | **POST** /v1/payouts/ | Create a payout
*PayoutsApi* | [**getPayout**](docs/Api/PayoutsApi.md#getpayout) | **GET** /v1/payouts/{payout_id} | Get payout
*PayoutsApi* | [**listPayouts**](docs/Api/PayoutsApi.md#listpayouts) | **GET** /v1/payouts/ | List payouts
*QRPhRequestsApi* | [**cancelQrph**](docs/Api/QRPhRequestsApi.md#cancelqrph) | **POST** /v1/qrph/{id}/cancel | Cancel a QRPh request
*QRPhRequestsApi* | [**createQrph**](docs/Api/QRPhRequestsApi.md#createqrph) | **POST** /v1/qrph/ | Create a QRPh request
*QRPhRequestsApi* | [**getQrph**](docs/Api/QRPhRequestsApi.md#getqrph) | **GET** /v1/qrph/{id} | Get QRPh status
*QRPhRequestsApi* | [**listQrph**](docs/Api/QRPhRequestsApi.md#listqrph) | **GET** /v1/qrph/ | List QRPh requests
*ReferencesApi* | [**listBankCodes**](docs/Api/ReferencesApi.md#listbankcodes) | **GET** /v1/references/bank_codes | List Bank Codes

## Models

- [ApiError](docs/Model/ApiError.md)
- [BankCodeCollection](docs/Model/BankCodeCollection.md)
- [BankCodeEntry](docs/Model/BankCodeEntry.md)
- [CancelQRPhRequest](docs/Model/CancelQRPhRequest.md)
- [CanonicalCreateQRReq](docs/Model/CanonicalCreateQRReq.md)
- [HTTPValidationError](docs/Model/HTTPValidationError.md)
- [PaymentCollectionResponse](docs/Model/PaymentCollectionResponse.md)
- [PaymentResponse](docs/Model/PaymentResponse.md)
- [PaymentSingleResponse](docs/Model/PaymentSingleResponse.md)
- [PayoutCollectionResponse](docs/Model/PayoutCollectionResponse.md)
- [PayoutCreateRequest](docs/Model/PayoutCreateRequest.md)
- [PayoutDestination](docs/Model/PayoutDestination.md)
- [PayoutDestinationResponse](docs/Model/PayoutDestinationResponse.md)
- [PayoutResponse](docs/Model/PayoutResponse.md)
- [PayoutSingleResponse](docs/Model/PayoutSingleResponse.md)
- [QRPhCollectionResponse](docs/Model/QRPhCollectionResponse.md)
- [QRPhResponse](docs/Model/QRPhResponse.md)
- [QRPhSingleResponse](docs/Model/QRPhSingleResponse.md)
- [ValidationError](docs/Model/ValidationError.md)
- [ValidationErrorLocInner](docs/Model/ValidationErrorLocInner.md)

## Authorization

Authentication schemes defined for the API:
### basicAuth

- **Type**: HTTP basic authentication

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
    - Generator version: `7.17.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
