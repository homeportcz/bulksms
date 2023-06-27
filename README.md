# OpenAPIClient-php

## Overview

The JSON REST API allows you to submit and receive [BulkSMS](https://www.bulksms.com/) messages. You can also get access to past messages and see your account profile.

The base URL to use for this service is `https://api.bulksms.com/v1`.  The base URL cannot be used on its own; you must append a path that identifies an operation and you may have to specify some path parameters as well.

[Click here](/developer/) to go to the main BulkSMS developer site.

In order to give you an idea on how the API can be used, some JSON snippets are provided below.  Have a look at the [messages section](#tag/Message) for more information.

Probably the most simple example

```
{
    \"to\": \"+27001234567\",
    \"body\": \"Hello World!\"
}
```


You can send unicode automatically using the `auto-unicode` query parameter. 
Alternatively, you can specify `UNICODE` for the `encoding` property in the request body. 
Please note: when `auto-unicode` is specified and the value of the `encoding` property is `UNICODE`, the message will always be sent as `UNICODE`.

Here is an example that sets the `encoding` explicitly

```
{
  \"to\": \"+27001234567\",
  \"body\": \"Dobrá práce! Jak se máš?\",
  \"encoding\": \"UNICODE\"
}
```

You can also specify a from number

```
{
    \"from\": \"+27007654321\",
    \"to\": \"+27001234567\",
    \"body\": \"Hello World!\"
}
```

Similar to above, but repliable

```
{
    \"from\": { \"type\": \"REPLIABLE\" },
    \"to\": \"+27001234567\",
    \"body\": \"Hello World!\"
}
```

A message to a group called Everyone

```
{
    \"to\": { \"type\": \"GROUP\", \"name\": \"Everyone\" },
    \"body\": \"Hello World!\"
}
```

A message to multiple recipients

```
{
    \"to\": [\"+27001234567\", \"+27002345678\", \"+27003456789\"],
    \"body\": \"Happy Holidays!\"
}
```

Sending more than one message in the same request

```
[
    {
        \"to\": \"+27001234567\",
        \"body\": \"Hello World!\"
    },
    {
        \"to\": \"+27002345678\",
        \"body\": \"Hello Universe!\"
    }
]
```

**The insecure base URL `http://api.bulksms.com/v1` is deprecated** and may in future result in a `301` redirect response, or insecure requests may be rejected outright. Please use the secure (`https`) URI above.

### HTTP Content Type

All API methods expect requests to supply a `Content-Type` header with the value `application/json`. All responses will have the `Content-Type` header set to `application/json`.

### JSON Formatting

You are advised to format your JSON resources according to strict JSON format rules. While the API does attempt to parse strictly invalid JSON documents, doing so may lead to incorrect interpretation and unexpected results.

Good JSON libraries will produce valid JSON suitable for submission, but if you are manually generating the JSON text, be careful to follow the JSON format. This include correct escaping of control characters and double quoting of property names.

See the [JSON specification](https://tools.ietf.org/html/rfc4627) for further information.

### Date Formatting

Dates are formatted according to ISO-8601, such as `1970-01-01T10:00:00+01:00` for 1st January 1970, 10AM UTC+1.

See the [Wikipedia ISO 8601 reference](https://en.wikipedia.org/wiki/ISO_8601) for further information.

Specifically, calendar dates are formatted with the 'extended' format `YYYY-MM-DD`. Basic format, week dates and ordinal dates are not supported. Times are also formatted in the 'extended' format `hh:mm:ss`. Hours, minutes and seconds are mandatory. Offset from UTC must be provided; this is to ensure that there is no misunderstanding regarding times provided to the API.

The format we look for is `yyyy-MM-ddThh:mm:ss[Z|[+-]hh:mm]`

Examples of valid date/times are`2011-12-31T12:00:00Z` `2011-12-31T12:00:00+02:00`

### Entity Format Modifications

It is expected that over time some changes will be made to the request and response formats of various methods available in the API.
Where possible, these will be implemented in a backwards compatible way.
To make this possible you are required to ignore unknown properties.
This enables the addition of information in response documents while maintaining compatibility with older clients.

### Optional Request Entity Properties

There are many instances where requests can be made without having to specify every single property allowable in the request format.
Any such optional properties are noted as such in the documentation and their default value is noted.



## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

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

## API Endpoints

All URIs are relative to *https://api.bulksms.com/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AttachmentsApi* | [**rmmPreSignAttachmentPost**](docs/Api/AttachmentsApi.md#rmmpresignattachmentpost) | **POST** /rmm/pre-sign-attachment | Upload an attachment via a signed URL
*BlockedNumbersApi* | [**blockedNumbersGet**](docs/Api/BlockedNumbersApi.md#blockednumbersget) | **GET** /blocked-numbers | List blocked numbers
*BlockedNumbersApi* | [**blockedNumbersPost**](docs/Api/BlockedNumbersApi.md#blockednumberspost) | **POST** /blocked-numbers | Create a blocked number
*CreditsApi* | [**creditTransferPost**](docs/Api/CreditsApi.md#credittransferpost) | **POST** /credit/transfer | Transfer credits to another account
*MessageApi* | [**messagesGet**](docs/Api/MessageApi.md#messagesget) | **GET** /messages | Retrieve Messages
*MessageApi* | [**messagesIdGet**](docs/Api/MessageApi.md#messagesidget) | **GET** /messages/{id} | Show Message
*MessageApi* | [**messagesIdRelatedReceivedMessagesGet**](docs/Api/MessageApi.md#messagesidrelatedreceivedmessagesget) | **GET** /messages/{id}/relatedReceivedMessages | List Related Messages
*MessageApi* | [**messagesPost**](docs/Api/MessageApi.md#messagespost) | **POST** /messages | Send Messages
*MessageApi* | [**messagesSendGet**](docs/Api/MessageApi.md#messagessendget) | **GET** /messages/send | Send message by simple GET or POST
*ProfileApi* | [**profileGet**](docs/Api/ProfileApi.md#profileget) | **GET** /profile | Get profile
*WebhooksApi* | [**webhooksGet**](docs/Api/WebhooksApi.md#webhooksget) | **GET** /webhooks | List webhooks
*WebhooksApi* | [**webhooksIdDelete**](docs/Api/WebhooksApi.md#webhooksiddelete) | **DELETE** /webhooks/{id} | Delete a webhook
*WebhooksApi* | [**webhooksIdGet**](docs/Api/WebhooksApi.md#webhooksidget) | **GET** /webhooks/{id} | Read a webhook
*WebhooksApi* | [**webhooksIdPost**](docs/Api/WebhooksApi.md#webhooksidpost) | **POST** /webhooks/{id} | Update a webhook
*WebhooksApi* | [**webhooksPost**](docs/Api/WebhooksApi.md#webhookspost) | **POST** /webhooks | Create a webhook

## Models

- [BlockedNumber](docs/Model/BlockedNumber.md)
- [Error](docs/Model/Error.md)
- [Message](docs/Model/Message.md)
- [MessageStatus](docs/Model/MessageStatus.md)
- [MessageSubmission](docs/Model/MessageSubmission.md)
- [PreSignInfo](docs/Model/PreSignInfo.md)
- [PreSignInfoFieldsInner](docs/Model/PreSignInfoFieldsInner.md)
- [PreSignRequest](docs/Model/PreSignRequest.md)
- [Profile](docs/Model/Profile.md)
- [ProfileCommerce](docs/Model/ProfileCommerce.md)
- [ProfileCommerceAddress](docs/Model/ProfileCommerceAddress.md)
- [ProfileCompany](docs/Model/ProfileCompany.md)
- [ProfileCredits](docs/Model/ProfileCredits.md)
- [ProfileOriginAddresses](docs/Model/ProfileOriginAddresses.md)
- [ProfileQuota](docs/Model/ProfileQuota.md)
- [SubmissionEntry](docs/Model/SubmissionEntry.md)
- [SubmissionEntryFrom](docs/Model/SubmissionEntryFrom.md)
- [SubmissionEntryToInner](docs/Model/SubmissionEntryToInner.md)
- [TransferEntry](docs/Model/TransferEntry.md)
- [Webhook](docs/Model/Webhook.md)
- [WebhookEntry](docs/Model/WebhookEntry.md)

## Authorization

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
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
