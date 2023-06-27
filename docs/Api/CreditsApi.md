# BulkSMS\CreditsApi

All URIs are relative to https://api.bulksms.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**creditTransferPost()**](CreditsApi.md#creditTransferPost) | **POST** /credit/transfer | Transfer credits to another account |


## `creditTransferPost()`

```php
creditTransferPost($body)
```

Transfer credits to another account

Before you can use the transfer credits endpoint, the _credit-transfer facility_ must be activated for your account.  You can request activation from `support@bulksms.com`.   The recipient must be an enabled account that uses the same currency as your account.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\CreditsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \BulkSMS\Model\TransferEntry(); // \BulkSMS\Model\TransferEntry | Contains details of the transfer request.

try {
    $apiInstance->creditTransferPost($body);
} catch (Exception $e) {
    echo 'Exception when calling CreditsApi->creditTransferPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | [**\BulkSMS\Model\TransferEntry**](../Model/TransferEntry.md)| Contains details of the transfer request. | |

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
