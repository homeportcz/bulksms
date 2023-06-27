# BulkSMS\MessageApi

All URIs are relative to https://api.bulksms.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**messagesGet()**](MessageApi.md#messagesGet) | **GET** /messages | Retrieve Messages |
| [**messagesIdGet()**](MessageApi.md#messagesIdGet) | **GET** /messages/{id} | Show Message |
| [**messagesIdRelatedReceivedMessagesGet()**](MessageApi.md#messagesIdRelatedReceivedMessagesGet) | **GET** /messages/{id}/relatedReceivedMessages | List Related Messages |
| [**messagesPost()**](MessageApi.md#messagesPost) | **POST** /messages | Send Messages |
| [**messagesSendGet()**](MessageApi.md#messagesSendGet) | **GET** /messages/send | Send message by simple GET or POST |


## `messagesGet()`

```php
messagesGet($limit, $filter, $sort_order): \BulkSMS\Model\Message[]
```

Retrieve Messages

Retrieve the messages you have sent or received.    Scheduled messages are available for retrieval only after the delivery date.  All the parameters are optional.  If a value is not supplied for `filter`, the messages are not filtered.  Messages can be filtered by supplying query clauses in the `filter` parameter. Each clause has the form `name=value` where `name` is the name of a filter field and `value` is a valid value for that field.  A value for a field is optional. Include a clause for a field in the filter only when there is a need to fetch messages that match some value for that field. For a numeric filter field, you can also use the less than operator (`<`).  If present, the filter value must have at least one clause, but it can contain a combination of clauses. Multiple clauses are separated with the `&` symbol.  Semantically, multiple clauses form a [logical conjunction](https://en.wikipedia.org/wiki/Logical_conjunction).  For example, if you want to list all messages that were sent as part of a particular submission, your filter contains two clauses and will look something like this ``` type%3DSENT&submission.id%3D1-00000000000522347562 ``` Because `filter` is a request parameter, it is important to note that the value for this parameter must be *URL encoded*. In particular, the `=` encodes to `%3D` and the `&` encodes to `%26`.  Note that you do not have to encode the `<` character.  Using the previous example to illustrate; after encoding and encasing it, the clauses are transformed into a request that looks like this ``` GET /v1/messages?filter=type%3DSENT%26submission.id%3D1-00000000000522347562 ``` If the field name or the field value of a clause is not valid, a [bad_request error](errors#bad-request) is returned instead of the usual result.  The `detail` field of this error provides more information about the problem.  The table below lists the fields available for filtering  | Field | Type   | Values | Note and example | |-------|------|--------------------|------| | id            | Integer  | Positive integer  | Use the `id` field with `<` (or with `>`) to fetch messages that are older (or newer) than those that are already fetched. <br/>`filter=id<123456` | | type          | String  | SENT, RECEIVED  | SENT are Mobile Terminating (MT) SMSs; RECEIVED are Mobile Originating (MO) SMSs.<br/>`filter=type%3DSENT` | | submission.id | String  |  | `filter=submission.id%3D1-00000000000522347562` | | status.type   | String  | ACCEPTED, SENT, DELIVERED, FAILED  | See the message `status.type` field for more information. <br/>`filter=status.type%3DDELIVERED` | | status.id| String  |  | See the message `status.id` field for more information. `filter=status.id%3DFAILED.EXPIRED`| | submission.date | String | Formatted Date | A fully specified date (e.g. 2017-01-01T10:00:00+01:00).  Use this field with `<=`, `<`, `>` or `>=` to limit the values. <br/>`filter=submission.date%3E%3D2017-01-01T10%3A00%3A00%2B01%3A00` | | userSuppliedId  | String | | Use a string value you specified in the `userSuppliedId` property when you sent the message. Only `SENT` messages will be retrieved. <br/>`filter=userSuppliedId%3Dacc009876` |

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 3.4; // float | The maximum number of messages that are returned.  The default is 1000. The value of `limit` is not a guarantee that a specific number of messages will be in the response, even if there are more messages available.  Consider the case where you have 150 messages and you specify `limit=50`.  It is possible that only 49 messages will be returned.  The  way to make sure that there are no more messages is to submit a new call using the `id` filter field with the `<` operator (described below).
$filter = 'filter_example'; // string | See the message filtering for more information.
$sort_order = 'sort_order_example'; // string | The default value is DESCENDING  If the `sortOrder` is DESCENDING, the newest messages be first in the result.  ASCENDING places the oldest messages on top of the response.

try {
    $result = $apiInstance->messagesGet($limit, $filter, $sort_order);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->messagesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **float**| The maximum number of messages that are returned.  The default is 1000. The value of &#x60;limit&#x60; is not a guarantee that a specific number of messages will be in the response, even if there are more messages available.  Consider the case where you have 150 messages and you specify &#x60;limit&#x3D;50&#x60;.  It is possible that only 49 messages will be returned.  The  way to make sure that there are no more messages is to submit a new call using the &#x60;id&#x60; filter field with the &#x60;&lt;&#x60; operator (described below). | [optional] |
| **filter** | **string**| See the message filtering for more information. | [optional] |
| **sort_order** | **string**| The default value is DESCENDING  If the &#x60;sortOrder&#x60; is DESCENDING, the newest messages be first in the result.  ASCENDING places the oldest messages on top of the response. | [optional] |

### Return type

[**\BulkSMS\Model\Message[]**](../Model/Message.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `messagesIdGet()`

```php
messagesIdGet($id): \BulkSMS\Model\Message
```

Show Message

Get a the message by `id`. ```http GET /v1/messages/4023457654 ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The `id` of the message you want to retrieve

try {
    $result = $apiInstance->messagesIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->messagesIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The &#x60;id&#x60; of the message you want to retrieve | |

### Return type

[**\BulkSMS\Model\Message**](../Model/Message.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `messagesIdRelatedReceivedMessagesGet()`

```php
messagesIdRelatedReceivedMessagesGet($id): \BulkSMS\Model\Message[]
```

List Related Messages

Get the messages related to a sent message identified by `id`.  For more information how this work, see the `relatedSentMessageId` field in the message.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The `id` of the sent message

try {
    $result = $apiInstance->messagesIdRelatedReceivedMessagesGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->messagesIdRelatedReceivedMessagesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The &#x60;id&#x60; of the sent message | |

### Return type

[**\BulkSMS\Model\Message[]**](../Model/Message.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `messagesPost()`

```php
messagesPost($body, $deduplication_id, $auto_unicode, $schedule_date, $schedule_description): \BulkSMS\Model\Message[]
```

Send Messages

Send messages to one or more recipients.  You can post up to `30 000` messages in a batch.  But note that the `deduplication-id` is set per submission, so it is recommended that you use a smaller number, like `4000` per submission in order to make resubmissions on network failures more practical.  #### Repliability  When a sent message is _repliable_,  the BulkSMS system can process an SMS response sent by your recipient.  The message sent by your customer is called a mobile originating (MO) message and would be available under `RECEIVED` messages.  You can obtain a list of MOs using the [retrieve messages API call](#tag/Message%2Fpaths%2F~1messages%2Fget). In addition you can also get a list of the MOs that are associated with a specific sent message (see the [list related messages API call](#tag/Message%2Fpaths%2F~1messages~1%7Bid%7D~1relatedReceivedMessages%2Fget)).  If you use a specific _sender id_ in the `from` property of the send message, the message will not be repliable. If you want a message to be repliable, you need to specify `REPLIABLE` in the `from.type` property.  If you do not set the `from` property, your account settings are considered to determine whether or not the message is repliable. If the _default repliable_ setting on your account is _yes_ then the message will be repliable.  If this setting is _no_, the message will not be repliable.   #### Body templates  When sending a message you can use template fields to customise the message text.  *Field based templates* allow you to create a message with place-holders for custom fields.  Fields are identified by a zero based index; the first field is `F0`, the second is `F1` and so on.    For example, let's say you want to send a daily SMS message to all your clients that tell them what their current balance is.  The `body` of the message could look something like this   ``` Good morning {F0######}, your balance is {F1######} ```  In this message, the first field, `F0`, is the name  of the customer and he second field `F1` is the balance for that customer.  The `#` used to specify the maximum length  of the field.  Note that the maximum length allowed for the value includes the space taken by the braces, template name and hash symbol.  For example, the value `{F0#}` specifies a maximum length of `5`.  If the data is longer than this length, the data will be truncated when the message body is constructed.  The data fields are provided in the property named `fields` in the `to` element.  Here is a complete example of how this might look  ``` {   \"body\": \"Good morning {F0######}, your balance is {F1######}\",   \"to\":  [       {\"address\": \"27456789\",\"fields\": [\"Harry\", \"$1345.23\"] },       {\"address\": \"27456785\",\"fields\": [\"Sally\", \"$2345.58\"] }   ] } ```  If you are sending to contacts (or to groups) in your phonebook, you can use the *Phonebook based templates*.  These are similar to the templates described above, but they have specific names. The template for the contact's first name is identified by `fn` and the template for the contact's surname is identified by `sn`.  Below in an example that will work if the numbers are registered in your phonebook.   ``` {   \"body\": \"Hi {fn######} {sn######}, have a great day!\",   \"to\":  [       {\"address\": \"27456789\" },       {\"address\": \"27456785\" }   ] } ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \BulkSMS\Model\SubmissionEntry()); // \BulkSMS\Model\SubmissionEntry[] | Contains details of the message (or messages) that you want to send.  One `SubmissionEntry` can produce many messages, and your request may contain multiple such entries.
$deduplication_id = 56; // int | Safeguards against the possibility of sending the same messages more than once.  If a communication failure occurs during a submission, you cannot be sure that the submission was processed; therefore you would have to submit it again. When you post the retry, you must use the `deduplication-id` of the original post. The BulkSMS system uses this ID to check that the request was not previously processed. (If it was previously processed, the submission will succeed, and the behaviour will be indistinguishable to you from a non-duplicated submission). The ID expires after about 12 hours.
$auto_unicode = false; // bool | Specifies how to deal with message text that contains characters not present in the GSM 03.38 character set.  Messages that contain only GSM 03.38 characters are not affected by this setting.  If the value is `true` then a message containing non-GSM 03.38 characters will be transmitted as a Unicode SMS (which is most likely more costly).   Please note: when `auto-unicode` is `true` and the value of the `encoding` property is specified as `UNICODE`, the message will always be sent as `UNICODE`.  If the value is `false` and the `encoding` property is `TEXT` then non-GSM 03.38 characters will be replaced by the `?` character.  When using this setting on the API, you should take case to ensure that your message is _clean_.    Invisible unicode and unexpected characters could unintentionally convert an message to `UNICODE`.  A common mistake is to use the backtick character (\\`) which is unicode and will turn your `TEXT` message into a `UNICODE` message.
$schedule_date = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | Allows you to send a message in the future.  An example value is `2019-02-18T13:00:00+02:00`.  It encodes to `2019-02-18T13%3A00%3A00%2B02%3A00`. Credits are deducted from your account immediately. Once submitted, scheduled messages cannot be changed or cancelled. The date can be a maximum of two years in the future. If the value is in the past, the message will be sent immediately. The date format requires you to supply an offset from UTC. You can decide to use the offset of your timezone, or maybe the zone of the recipient's location is more appropriate. If the destination is a group, the group members are determined at the time that you submit the message; not the time the message is scheduled to be sent.
$schedule_description = 'schedule_description_example'; // string | A note that is stored together with a scheduled submission, which could be used to more easily identify the scheduled submission at a later date.  The value of this field is ignored if the `schedule-date` is not provided. A value that is longer than 256 characters is truncated.

try {
    $result = $apiInstance->messagesPost($body, $deduplication_id, $auto_unicode, $schedule_date, $schedule_description);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->messagesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | [**\BulkSMS\Model\SubmissionEntry[]**](../Model/SubmissionEntry.md)| Contains details of the message (or messages) that you want to send.  One &#x60;SubmissionEntry&#x60; can produce many messages, and your request may contain multiple such entries. | |
| **deduplication_id** | **int**| Safeguards against the possibility of sending the same messages more than once.  If a communication failure occurs during a submission, you cannot be sure that the submission was processed; therefore you would have to submit it again. When you post the retry, you must use the &#x60;deduplication-id&#x60; of the original post. The BulkSMS system uses this ID to check that the request was not previously processed. (If it was previously processed, the submission will succeed, and the behaviour will be indistinguishable to you from a non-duplicated submission). The ID expires after about 12 hours. | [optional] |
| **auto_unicode** | **bool**| Specifies how to deal with message text that contains characters not present in the GSM 03.38 character set.  Messages that contain only GSM 03.38 characters are not affected by this setting.  If the value is &#x60;true&#x60; then a message containing non-GSM 03.38 characters will be transmitted as a Unicode SMS (which is most likely more costly).   Please note: when &#x60;auto-unicode&#x60; is &#x60;true&#x60; and the value of the &#x60;encoding&#x60; property is specified as &#x60;UNICODE&#x60;, the message will always be sent as &#x60;UNICODE&#x60;.  If the value is &#x60;false&#x60; and the &#x60;encoding&#x60; property is &#x60;TEXT&#x60; then non-GSM 03.38 characters will be replaced by the &#x60;?&#x60; character.  When using this setting on the API, you should take case to ensure that your message is _clean_.    Invisible unicode and unexpected characters could unintentionally convert an message to &#x60;UNICODE&#x60;.  A common mistake is to use the backtick character (\\&#x60;) which is unicode and will turn your &#x60;TEXT&#x60; message into a &#x60;UNICODE&#x60; message. | [optional] [default to false] |
| **schedule_date** | **\DateTime**| Allows you to send a message in the future.  An example value is &#x60;2019-02-18T13:00:00+02:00&#x60;.  It encodes to &#x60;2019-02-18T13%3A00%3A00%2B02%3A00&#x60;. Credits are deducted from your account immediately. Once submitted, scheduled messages cannot be changed or cancelled. The date can be a maximum of two years in the future. If the value is in the past, the message will be sent immediately. The date format requires you to supply an offset from UTC. You can decide to use the offset of your timezone, or maybe the zone of the recipient&#39;s location is more appropriate. If the destination is a group, the group members are determined at the time that you submit the message; not the time the message is scheduled to be sent. | [optional] |
| **schedule_description** | **string**| A note that is stored together with a scheduled submission, which could be used to more easily identify the scheduled submission at a later date.  The value of this field is ignored if the &#x60;schedule-date&#x60; is not provided. A value that is longer than 256 characters is truncated. | [optional] |

### Return type

[**\BulkSMS\Model\Message[]**](../Model/Message.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `messagesSendGet()`

```php
messagesSendGet($to, $body, $deduplication_id): \BulkSMS\Model\Message[]
```

Send message by simple GET or POST

A really simple interface for people who require a GET mechanism to submit a single message.  The URI is interpreted as UTF-8. HTTP Basic Auth is used for authentication.  __Note__ BulkSMS recommends that you use the more flexible Send Messages Operation when submitting SMS messages from your application.  Here is an example of a GET ```http GET /v1/messages/send?to=%2b270000000&body=Hello%20World ```  You can also use the same parameters to POST form encoded fields to `/messages`. Here is an example of a POST ```http POST /v1/messages Content-Type: application/x-www-form-urlencoded  to=%2b27000000000&body=Hello+World ```

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = BulkSMS\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new BulkSMS\Api\MessageApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$to = 'to_example'; // string | The phone number of the recipient.
$body = 'body_example'; // string | The text you want to send.
$deduplication_id = 56; // int | Refer to the `deduplication-id` parameter.

try {
    $result = $apiInstance->messagesSendGet($to, $body, $deduplication_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessageApi->messagesSendGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **to** | **string**| The phone number of the recipient. | |
| **body** | **string**| The text you want to send. | |
| **deduplication_id** | **int**| Refer to the &#x60;deduplication-id&#x60; parameter. | [optional] |

### Return type

[**\BulkSMS\Model\Message[]**](../Model/Message.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
