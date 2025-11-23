# MagpiePay\PaymentsApi

Payments are processed when the customer scans the QR code and approves the payment using their financial app. The payment is routed through the customer’s bank or e-wallet and validated through the national QRPh network. Once the transaction is completed, the merchant receives a real-time callback notification containing the payment amount, payment channel, timestamps, and confirmation message.

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getPaymentV1PaymentsPaymentIdGet()**](PaymentsApi.md#getPaymentV1PaymentsPaymentIdGet) | **GET** /v1/payments/{payment_id} | Get payment |
| [**listPaymentsV1PaymentsGet()**](PaymentsApi.md#listPaymentsV1PaymentsGet) | **GET** /v1/payments/ | List payments |


## `getPaymentV1PaymentsPaymentIdGet()`

```php
getPaymentV1PaymentsPaymentIdGet($payment_id, $x_api_key, $authorization): \MagpiePay\Model\PaymentSingleResponse
```

Get payment

Retrieve the current state of a QRPh payment.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = MagpiePay\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


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
    $result = $apiInstance->getPaymentV1PaymentsPaymentIdGet($payment_id, $x_api_key, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentsApi->getPaymentV1PaymentsPaymentIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payment_id** | **string**|  | |
| **x_api_key** | **string**|  | [optional] |
| **authorization** | **string**|  | [optional] |

### Return type

[**\MagpiePay\Model\PaymentSingleResponse**](../Model/PaymentSingleResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPaymentsV1PaymentsGet()`

```php
listPaymentsV1PaymentsGet($limit, $cursor, $x_api_key, $authorization): \MagpiePay\Model\PaymentCollectionResponse
```

List payments

Returns a paginated list of QRPh payments for the authenticated organization.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = MagpiePay\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new MagpiePay\Api\PaymentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 50; // int | Number of payments to return (1-100).
$cursor = 'cursor_example'; // string | Cursor returned from the previous page.
$x_api_key = 'x_api_key_example'; // string
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->listPaymentsV1PaymentsGet($limit, $cursor, $x_api_key, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PaymentsApi->listPaymentsV1PaymentsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Number of payments to return (1-100). | [optional] [default to 50] |
| **cursor** | **string**| Cursor returned from the previous page. | [optional] |
| **x_api_key** | **string**|  | [optional] |
| **authorization** | **string**|  | [optional] |

### Return type

[**\MagpiePay\Model\PaymentCollectionResponse**](../Model/PaymentCollectionResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
