# BulkSMS\BlockedNumbersApi

All URIs are relative to https://api.bulksms.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**blockedNumbersGet()**](BlockedNumbersApi.md#blockedNumbersGet) | **GET** /blocked-numbers | List blocked numbers |
| [**blockedNumbersPost()**](BlockedNumbersApi.md#blockedNumbersPost) | **POST** /blocked-numbers | Create a blocked number |


## `blockedNumbersGet()`

```php
blockedNumbersGet($min_id, $limit): \BulkSMS\Model\BlockedNumber
```

List blocked numbers

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\BlockedNumbersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$min_id = NULL; // mixed | Records with an `id` that is greater or equal to min-id will be returned. The default value is `0`.  You can add 1 to an id that you previously retrieved, to return subsequent records.
$limit = NULL; // mixed | The maximum number of records to return. The default value is `10000`. The value cannot be greater than 10000.

try {
    $result = $apiInstance->blockedNumbersGet($min_id, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BlockedNumbersApi->blockedNumbersGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **min_id** | [**mixed**](../Model/.md)| Records with an &#x60;id&#x60; that is greater or equal to min-id will be returned. The default value is &#x60;0&#x60;.  You can add 1 to an id that you previously retrieved, to return subsequent records. | [optional] |
| **limit** | [**mixed**](../Model/.md)| The maximum number of records to return. The default value is &#x60;10000&#x60;. The value cannot be greater than 10000. | [optional] |

### Return type

[**\BulkSMS\Model\BlockedNumber**](../Model/BlockedNumber.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `blockedNumbersPost()`

```php
blockedNumbersPost($body)
```

Create a blocked number

Blocked numbers are phone numbers to which your account is not permitted to send messages. The numbers can be created via this API, by a recipient replying with a STOP message to one of your previous SENT messages, or by a BulkSMS administrator.  Sending a message to a blocked number will result in the message being assigned a status of `FAILED.BLOCKED`. Messages sent to blocked numbers are billed to your account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\BlockedNumbersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array('body_example'); // string[] | Maximum size: `1000` items

try {
    $apiInstance->blockedNumbersPost($body);
} catch (Exception $e) {
    echo 'Exception when calling BlockedNumbersApi->blockedNumbersPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | [**string[]**](../Model/string.md)| Maximum size: &#x60;1000&#x60; items | |

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
