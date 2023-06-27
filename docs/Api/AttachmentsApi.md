# BulkSMS\AttachmentsApi

All URIs are relative to https://api.bulksms.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**rmmPreSignAttachmentPost()**](AttachmentsApi.md#rmmPreSignAttachmentPost) | **POST** /rmm/pre-sign-attachment | Upload an attachment via a signed URL |


## `rmmPreSignAttachmentPost()`

```php
rmmPreSignAttachmentPost($body): \BulkSMS\Model\PreSignInfo
```

Upload an attachment via a signed URL

When composing an SMS, you can add SMS attachments by adding a URL to your text. When the recipient clicks on the URL, the attached file will be downloaded and opened on their mobile device.    The best way to do this is to store the file on a web server you own and use that URL in the SMS text. This URL will be easily recognisable to your message recipient and ties your message back to your brand or company.   If that’s not possible, you can use BulkSMS storage to keep the files that you want to attach to your SMS. These files will be deleted after 30 days as per our fair use policy.    We recommend you keep this file size below 20 MB, as larger files may be deleted without warning.   To use the BulkSMS storage, follow these three steps:  **Step 1**: Use your BulkSMS credentials (or your API Token) to request a pre-signed URL.  This is what this `pre-sign-attachment` method is for.  It returns a PreSignInfo object that you will use in the other two steps.  **Step 2**: Upload the file using a standard HTTP `PUT` request. For your `PUT` request, use the value of `putURL` from the PreSignInfo object as the request address.  You also have to add the entries from the `fields` property (of the PreSignInfo object) to the headers of your 'PUT' request. You send the file content as the body of the `PUT` request.  **Step 3**: Now you can use the value of `fetchURL` from the PreSignInfo object in the body of your SMS messages and send those using the usual messaging API (described elsewhere in this document).  If you send the same file to many recipients, it is safe to use the same URL for all of them.  If you need to, take a closer look at the example program (on the right-hand side) to get a better idea of how to implement this process.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\AttachmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \BulkSMS\Model\PreSignRequest(); // \BulkSMS\Model\PreSignRequest | Describes the file to upload

try {
    $result = $apiInstance->rmmPreSignAttachmentPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AttachmentsApi->rmmPreSignAttachmentPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | [**\BulkSMS\Model\PreSignRequest**](../Model/PreSignRequest.md)| Describes the file to upload | |

### Return type

[**\BulkSMS\Model\PreSignInfo**](../Model/PreSignInfo.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
