# MagpiePay\QRPhRequestsApi



All URIs are relative to https://api.magpiepay.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelQrph()**](QRPhRequestsApi.md#cancelQrph) | **POST** /v1/qrph/{id}/cancel | Cancel a QRPh request |
| [**createQrph()**](QRPhRequestsApi.md#createQrph) | **POST** /v1/qrph/ | Create a QRPh request |
| [**getQrph()**](QRPhRequestsApi.md#getQrph) | **GET** /v1/qrph/{id} | Get QRPh status |
| [**listQrph()**](QRPhRequestsApi.md#listQrph) | **GET** /v1/qrph/ | List QRPh requests |


## `cancelQrph()`

```php
cancelQrph($id, $x_api_key, $authorization, $cancel_qrph_request): \MagpiePay\Model\QRPhSingleResponse
```

Cancel a QRPh request

Cancels the specified QRPh request and returns the updated request record.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = MagpiePay\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new MagpiePay\Api\QRPhRequestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$x_api_key = 'x_api_key_example'; // string
$authorization = 'authorization_example'; // string
$cancel_qrph_request = {"cancellation_reason":"Customer requested refund"}; // \MagpiePay\Model\CancelQRPhRequest

try {
    $result = $apiInstance->cancelQrph($id, $x_api_key, $authorization, $cancel_qrph_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QRPhRequestsApi->cancelQrph: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **x_api_key** | **string**|  | [optional] |
| **authorization** | **string**|  | [optional] |
| **cancel_qrph_request** | [**\MagpiePay\Model\CancelQRPhRequest**](../Model/CancelQRPhRequest.md)|  | [optional] |

### Return type

[**\MagpiePay\Model\QRPhSingleResponse**](../Model/QRPhSingleResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createQrph()`

```php
createQrph($canonical_create_qr_req, $x_api_key, $authorization): \MagpiePay\Model\QRPhSingleResponse
```

Create a QRPh request

Creates a QRPh request from the canonical payload and returns the normalized request with the checkout URL attached.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = MagpiePay\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new MagpiePay\Api\QRPhRequestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$canonical_create_qr_req = {"reference_id":"order-2025-11-20","type":"dynamic","amount":2500,"metadata":{"customer_id":"cust_123","notes":"in-store purchase"}}; // \MagpiePay\Model\CanonicalCreateQRReq
$x_api_key = 'x_api_key_example'; // string
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->createQrph($canonical_create_qr_req, $x_api_key, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QRPhRequestsApi->createQrph: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **canonical_create_qr_req** | [**\MagpiePay\Model\CanonicalCreateQRReq**](../Model/CanonicalCreateQRReq.md)|  | |
| **x_api_key** | **string**|  | [optional] |
| **authorization** | **string**|  | [optional] |

### Return type

[**\MagpiePay\Model\QRPhSingleResponse**](../Model/QRPhSingleResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getQrph()`

```php
getQrph($id, $x_api_key, $authorization): \MagpiePay\Model\QRPhSingleResponse
```

Get QRPh status

Returns the current QRPh request state, including checkout URLs and payment IDs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = MagpiePay\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new MagpiePay\Api\QRPhRequestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string
$x_api_key = 'x_api_key_example'; // string
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->getQrph($id, $x_api_key, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QRPhRequestsApi->getQrph: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |
| **x_api_key** | **string**|  | [optional] |
| **authorization** | **string**|  | [optional] |

### Return type

[**\MagpiePay\Model\QRPhSingleResponse**](../Model/QRPhSingleResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listQrph()`

```php
listQrph($limit, $cursor, $reference_id, $x_api_key, $authorization): \MagpiePay\Model\QRPhCollectionResponse
```

List QRPh requests

Returns a paginated collection of QRPh requests for the authenticated organization. Use `limit` and `cursor` for pagination and `reference_id` to locate a specific request.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = MagpiePay\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new MagpiePay\Api\QRPhRequestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 50; // int | Number of items to return (1-100).
$cursor = 'cursor_example'; // string | Opaque cursor returned from the previous page for pagination.
$reference_id = 'reference_id_example'; // string | Filter on a specific request reference ID.
$x_api_key = 'x_api_key_example'; // string
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->listQrph($limit, $cursor, $reference_id, $x_api_key, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QRPhRequestsApi->listQrph: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Number of items to return (1-100). | [optional] [default to 50] |
| **cursor** | **string**| Opaque cursor returned from the previous page for pagination. | [optional] |
| **reference_id** | **string**| Filter on a specific request reference ID. | [optional] |
| **x_api_key** | **string**|  | [optional] |
| **authorization** | **string**|  | [optional] |

### Return type

[**\MagpiePay\Model\QRPhCollectionResponse**](../Model/QRPhCollectionResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
