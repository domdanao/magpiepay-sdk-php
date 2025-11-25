# MagpiePay\PayoutsApi

The payout service allows partners to send funds from their disbursement account to any participating bank or e-wallet in the Philippines. Two clearing networks are supported—InstaPay and PESONet—giving partners flexibility depending on speed and transaction value.&lt;br/&gt;&lt;br/&gt;InstaPay enables real-time, low-value transfers of up to ₱50,000 per transaction. Funds are processed instantly and typically reach the recipient within seconds. This is ideal for time-sensitive disbursements such as customer refunds, driver or rider payouts, incentives, or wallet top-ups.,&lt;br/&gt;&lt;br/&gt;PESONet supports larger-value or batch transfers processed according to the network’s scheduled clearing cycle. It is suited for bulk payouts, salary runs, vendor payments, and other high-value transfers where same-day or next-day posting is acceptable.

All URIs are relative to https://api.magpiepay.com, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createPayout()**](PayoutsApi.md#createPayout) | **POST** /v1/payouts/ | Create a payout |
| [**getPayout()**](PayoutsApi.md#getPayout) | **GET** /v1/payouts/{payout_id} | Get payout |
| [**listPayouts()**](PayoutsApi.md#listPayouts) | **GET** /v1/payouts/ | List payouts |


## `createPayout()`

```php
createPayout($payout_create_request, $x_api_key, $authorization): \MagpiePay\Model\PayoutSingleResponse
```

Create a payout

Initiates a payout using a canonical payload and returns the normalized payout record.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = MagpiePay\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new MagpiePay\Api\PayoutsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_create_request = {"reference_id":"PAYOUT-123-456","channel":"instapay","amount":40000,"source_account_id":"act_01k90z02ps251323zgkd23cb0d","destination":{"first_name":"Juan","last_name":"Dela Cruz","bank_code":"bdo","account_number":"002400091125"},"purpose":"Salary payout"}; // \MagpiePay\Model\PayoutCreateRequest
$x_api_key = 'x_api_key_example'; // string
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->createPayout($payout_create_request, $x_api_key, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutsApi->createPayout: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payout_create_request** | [**\MagpiePay\Model\PayoutCreateRequest**](../Model/PayoutCreateRequest.md)|  | |
| **x_api_key** | **string**|  | [optional] |
| **authorization** | **string**|  | [optional] |

### Return type

[**\MagpiePay\Model\PayoutSingleResponse**](../Model/PayoutSingleResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPayout()`

```php
getPayout($payout_id, $x_api_key, $authorization): \MagpiePay\Model\PayoutSingleResponse
```

Get payout

Retrieves the latest state for a payout.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = MagpiePay\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new MagpiePay\Api\PayoutsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$payout_id = 'payout_id_example'; // string
$x_api_key = 'x_api_key_example'; // string
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->getPayout($payout_id, $x_api_key, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutsApi->getPayout: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **payout_id** | **string**|  | |
| **x_api_key** | **string**|  | [optional] |
| **authorization** | **string**|  | [optional] |

### Return type

[**\MagpiePay\Model\PayoutSingleResponse**](../Model/PayoutSingleResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPayouts()`

```php
listPayouts($limit, $cursor, $reference_id, $x_api_key, $authorization): \MagpiePay\Model\PayoutCollectionResponse
```

List payouts

Returns a paginated collection of payouts for the authenticated organization.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = MagpiePay\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new MagpiePay\Api\PayoutsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 50; // int | Number of payouts to return (1-100).
$cursor = 'cursor_example'; // string | Cursor returned from the previous page.
$reference_id = 'reference_id_example'; // string | Filter payouts by reference ID.
$x_api_key = 'x_api_key_example'; // string
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->listPayouts($limit, $cursor, $reference_id, $x_api_key, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PayoutsApi->listPayouts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **int**| Number of payouts to return (1-100). | [optional] [default to 50] |
| **cursor** | **string**| Cursor returned from the previous page. | [optional] |
| **reference_id** | **string**| Filter payouts by reference ID. | [optional] |
| **x_api_key** | **string**|  | [optional] |
| **authorization** | **string**|  | [optional] |

### Return type

[**\MagpiePay\Model\PayoutCollectionResponse**](../Model/PayoutCollectionResponse.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
