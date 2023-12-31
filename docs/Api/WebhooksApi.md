# BulkSMS\WebhooksApi

All URIs are relative to https://api.bulksms.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**webhooksGet()**](WebhooksApi.md#webhooksGet) | **GET** /webhooks | List webhooks |
| [**webhooksIdDelete()**](WebhooksApi.md#webhooksIdDelete) | **DELETE** /webhooks/{id} | Delete a webhook |
| [**webhooksIdGet()**](WebhooksApi.md#webhooksIdGet) | **GET** /webhooks/{id} | Read a webhook |
| [**webhooksIdPost()**](WebhooksApi.md#webhooksIdPost) | **POST** /webhooks/{id} | Update a webhook |
| [**webhooksPost()**](WebhooksApi.md#webhooksPost) | **POST** /webhooks | Create a webhook |


## `webhooksGet()`

```php
webhooksGet(): \BulkSMS\Model\Webhook[]
```

List webhooks

Contains a list of your webhooks

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->webhooksGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BulkSMS\Model\Webhook[]**](../Model/Webhook.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksIdDelete()`

```php
webhooksIdDelete($id)
```

Delete a webhook

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The `id` of the webhook

try {
    $apiInstance->webhooksIdDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The &#x60;id&#x60; of the webhook | |

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksIdGet()`

```php
webhooksIdGet($id): \BulkSMS\Model\Webhook
```

Read a webhook

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The `id` of the webhook

try {
    $result = $apiInstance->webhooksIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The &#x60;id&#x60; of the webhook | |

### Return type

[**\BulkSMS\Model\Webhook**](../Model/Webhook.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksIdPost()`

```php
webhooksIdPost($id, $body): \BulkSMS\Model\Webhook
```

Update a webhook

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The `id` of the webhook
$body = new \BulkSMS\Model\WebhookEntry(); // \BulkSMS\Model\WebhookEntry | Contains the new property values for the webhook

try {
    $result = $apiInstance->webhooksIdPost($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksIdPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The &#x60;id&#x60; of the webhook | |
| **body** | [**\BulkSMS\Model\WebhookEntry**](../Model/WebhookEntry.md)| Contains the new property values for the webhook | |

### Return type

[**\BulkSMS\Model\Webhook**](../Model/Webhook.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksPost()`

```php
webhooksPost($body): \BulkSMS\Model\Webhook
```

Create a webhook

A webhook is an URL that you can register when you want the BulkSMS system to notify you about your messages. You can register multiple webhooks, and each one will be called.  (Note: you can also use our [Web App](https://www.bulksms.com/account/#!/advanced-settings/webhooks) to manage your webhooks interactively.)   If you want to be notified of `SENT` messages and `RECEIVED` messages you need to create two webhooks.   ### Implementing your webhook  Code samples of Webhook implementations: * [PHP](samples/webhook-php.html)  When you implement your webhook, there are a few rules to be aware of: - Your webhook must process `POST` requests that contains an array of messages in the post body.  This input given to your webhook has the same structure as the output produced when you call [Retrieve Messages](#tag/Message%2Fpaths%2F~1messages%2Fget). - When you register or update your webhook, the URL will be tested by invoking it with an empty array (`[]`).  - It is possible for your webhook to receive multiple updates for the same message and status. It happens from time to time that the mobile network duplicates status updates. - The order by which the webhook is invoked can be unexpected.  For example, if sender A replies before sender B, your webhook might get the reply from B first. - The webhook is expected to comply with good practices with regard to the status code it responds with.   - A status code in the `1xx` and `2xx` range is taken as an acknowledgement that the invocation was received and that the webhook host is ready to receive another.   - A status code in the `4xx` range is taken as a permanent problem and indicates that the webhook cannot process the message. The specific message that caused the error will be discarded, but your webhook will be invoked again when another message becomes available.   - Any other status code will be taken as a temporary problem; and indicates that the BulkSMS system should retry. The specific message that caused the error will not be discarded and your webhook will be invoked again with this message (see the subsequent section for more details on retry processing). - Your webhook has to respond within `30` seconds.  If no response is given in this time, the invocation will be retried. - It is good idea to add a secret to your URL in order to make it more secure. Here is an example: `https://www.example.com/hook.php?secret=pass763265word` - You can use a non-standard port if necessary, for example: `https://www.example.com:8321/hook.php?secret=pass763265word` - Your webhook can be called from a dynamic range of IP addresses, and you should be prepared to accept that the source IP can change in the future, without notice. This practice has become common with cloud-hosted solutions. If this is an insurmountable problem for your organisation, please contact support.  ### Testing and troubleshooting          Use `curl` to test your webhook.  The command below is a template that shows how the BulkSMS system invokes your code. It must return `200` for your URL before you can register it as a webhook.   ``` curl -i -X POST 'YOUR_URL_HERE' --header 'Content-Type: application/json' --header 'User-Agent: BulkSMS Invoker' --data-raw '[]' ```  When a `200` is returned for an empty array, modify the template to post multiple messages by adding JSON between the square brackets ('[]').  After your webhook is successfully registered, you can send a message to `1111111` for an end-to-end test.  The delivery to this test number will fail, but your webhook will be invoked (and there are no charges).    ### The retry process  The process the BulkSMS systems follow to handle retries is roughly the following: - The first retry is scheduled for 90 seconds into the future. - After the first retry, subsequent failures will have longer delays, following this sequence - 3 minutes, 6 minutes, 12 minutes thereafter the message will be retried every 15 minutes for a 2 day period. - When all retries fail, the message will be discarded.  ### Problem reports via email  Your are strongly advised to provide an email address when you register your webhook. A notice will be sent to this email address to keep you in the loop whenever there are problems with your webhook. In order to prevent your inbox from being flooded, the system sends a notice about an observed error no more than once in a 24 hour period.  The following emails can be expected  - A __message retrying__ email is sent after an invocation has failed with a retry-able error.  This email is an early warning, allowing you to investigate your systems.  - A __message discarded__ email is sent after failure email is send when a message is discarded as a consequence of a non-retry-able error.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \BulkSMS\Model\WebhookEntry(); // \BulkSMS\Model\WebhookEntry | Contains the property values for your new webhook

try {
    $result = $apiInstance->webhooksPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | [**\BulkSMS\Model\WebhookEntry**](../Model/WebhookEntry.md)| Contains the property values for your new webhook | |

### Return type

[**\BulkSMS\Model\Webhook**](../Model/Webhook.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
