# MagpiePay PHP SDK

The official PHP client for the MagpiePay API.

## Installation

Install the package via Composer:

```bash
composer require domdanao/magpiepay-sdk-php
```

## Laravel Integration

The SDK is fully compatible with Laravel. Here is the recommended way to integrate it.

### 1. Configure Credentials

Add your API key to your `.env` file:

```dotenv
MAGPIE_API_KEY=sk_live_...
```

Add the configuration to `config/services.php`:

```php
'magpie' => [
    'key' => env('MAGPIE_API_KEY'),
],
```

### 2. Register Service Provider

In your `app/Providers/AppServiceProvider.php`, register the client so it can be automatically injected into your controllers.

```php
use MagpiePay\Configuration;
use MagpiePay\Api\PaymentsApi;
use MagpiePay\Api\PayoutsApi;
use MagpiePay\Api\QRPhRequestsApi;
use MagpiePay\Api\ReferencesApi;
use GuzzleHttp\Client;

public function register()
{
    $this->app->singleton(Configuration::class, function ($app) {
        return Configuration::getDefaultConfiguration()
            ->setUsername(config('services.magpie.key'))
            ->setPassword('');
    });

    $this->app->bind(PaymentsApi::class, function ($app) {
        return new PaymentsApi(new Client(), $app->make(Configuration::class));
    });

    $this->app->bind(PayoutsApi::class, function ($app) {
        return new PayoutsApi(new Client(), $app->make(Configuration::class));
    });
    
    // Bind other APIs as needed...
}
```

### 3. Usage in Controllers

Now you can type-hint the API classes in your controllers, and Laravel will automatically inject the configured instance.

```php
namespace App\Http\Controllers;

use MagpiePay\Api\PaymentsApi;

class PaymentController extends Controller
{
    public function index(PaymentsApi $api)
    {
        try {
            $payments = $api->listPaymentsV1PaymentsGet();
            return response()->json($payments->getData());
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
```

## Getting Started

### Authentication

Initialize the client with your API key. The API uses Basic Authentication, where the username is your API key and the password is left empty.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use MagpiePay\Configuration;
use MagpiePay\Api\PaymentsApi;
use GuzzleHttp\Client;

$config = Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_API_KEY')
    ->setPassword(''); // Password is empty for MagpiePay API Key auth

$paymentsApi = new PaymentsApi(
    new Client(),
    $config
);
```

### Quick Start: List Bank Codes

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use MagpiePay\Configuration;
use MagpiePay\Api\ReferencesApi;
use GuzzleHttp\Client;

$config = Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_API_KEY')
    ->setPassword('');

$referencesApi = new ReferencesApi(new Client(), $config);

try {
    $result = $referencesApi->listBankCodesV1ReferencesBankCodesGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReferencesApi->listBankCodesV1ReferencesBankCodesGet: ', $e->getMessage(), PHP_EOL;
}
```

## Recipes

### Create a Payment (QRPh)

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use MagpiePay\Configuration;
use MagpiePay\Api\QRPhRequestsApi;
use MagpiePay\Model\CanonicalCreateQRReq;
use GuzzleHttp\Client;

$config = Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_API_KEY')
    ->setPassword('');

$qrphApi = new QRPhRequestsApi(new Client(), $config);

$request = new CanonicalCreateQRReq([
    'reference_id' => 'my-ref-123',
    'amount' => 10000, // 100.00 PHP
    'type' => 'dynamic',
    'metadata' => ['customer_name' => 'John Doe']
]);

try {
    $response = $qrphApi->createQrphV1QrphPost($request);
    echo "Payment Created: " . $response->getData()->getId() . PHP_EOL;
    echo "Checkout URL: " . $response->getData()->getCheckoutUrl() . PHP_EOL;
} catch (Exception $e) {
    echo 'Error creating payment: ', $e->getMessage(), PHP_EOL;
}
```

### Create a Payout

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use MagpiePay\Configuration;
use MagpiePay\Api\PayoutsApi;
use MagpiePay\Model\PayoutCreateRequest;
use MagpiePay\Model\PayoutDestination;
use GuzzleHttp\Client;

$config = Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_API_KEY')
    ->setPassword('');

$payoutsApi = new PayoutsApi(new Client(), $config);

$destination = new PayoutDestination([
    'bank_code' => 'BDO',
    'account_number' => '1234567890',
    'first_name' => 'Jane',
    'last_name' => 'Doe'
]);

$request = new PayoutCreateRequest([
    'reference_id' => 'payout-ref-456',
    'amount' => 50000, // 500.00 PHP
    'channel' => 'instapay',
    'source_account_id' => 'src_123',
    'destination' => $destination
]);

try {
    $response = $payoutsApi->createPayoutV1PayoutsPost($request);
    echo "Payout Initiated: " . $response->getData()->getId() . PHP_EOL;
} catch (Exception $e) {
    echo 'Error creating payout: ', $e->getMessage(), PHP_EOL;
}
```

## API Endpoints

All URIs are relative to *http://localhost*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*PaymentsApi* | [**getPaymentV1PaymentsPaymentIdGet**](docs/Api/PaymentsApi.md#getpaymentv1paymentspaymentidget) | **GET** /v1/payments/{payment_id} | Get payment
*PaymentsApi* | [**listPaymentsV1PaymentsGet**](docs/Api/PaymentsApi.md#listpaymentsv1paymentsget) | **GET** /v1/payments/ | List payments
*PayoutsApi* | [**createPayoutV1PayoutsPost**](docs/Api/PayoutsApi.md#createpayoutv1payoutspost) | **POST** /v1/payouts/ | Create a payout
*PayoutsApi* | [**getPayoutV1PayoutsPayoutIdGet**](docs/Api/PayoutsApi.md#getpayoutv1payoutspayoutidget) | **GET** /v1/payouts/{payout_id} | Get payout
*PayoutsApi* | [**listPayoutsV1PayoutsGet**](docs/Api/PayoutsApi.md#listpayoutsv1payoutsget) | **GET** /v1/payouts/ | List payouts
*QRPhRequestsApi* | [**cancelQrphV1QrphIdCancelPost**](docs/Api/QRPhRequestsApi.md#cancelqrphv1qrphidcancelpost) | **POST** /v1/qrph/{id}/cancel | Cancel a QRPh request
*QRPhRequestsApi* | [**createQrphV1QrphPost**](docs/Api/QRPhRequestsApi.md#createqrphv1qrphpost) | **POST** /v1/qrph/ | Create a QRPh request
*QRPhRequestsApi* | [**getQrphStatusV1QrphIdGet**](docs/Api/QRPhRequestsApi.md#getqrphstatusv1qrphidget) | **GET** /v1/qrph/{id} | Get QRPh status
*QRPhRequestsApi* | [**listQrphV1QrphGet**](docs/Api/QRPhRequestsApi.md#listqrphv1qrphget) | **GET** /v1/qrph/ | List QRPh requests
*ReferencesApi* | [**listBankCodesV1ReferencesBankCodesGet**](docs/Api/ReferencesApi.md#listbankcodesv1referencesbankcodesget) | **GET** /v1/references/bank_codes | List Bank Codes

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
