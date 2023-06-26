# # SubmissionEntryToInner

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | Type of the recipient. The default value is INTERNATIONAL. | [optional]
**address** | **string** | The phone number of the recipient.  It must be supplied if the &#x60;type&#x60; is INTERNATIONAL | [optional]
**name** | **string** | The name of a group in your phonebook. A value can be given if the &#x60;type&#x60; is GROUP. | [optional]
**id** | **string** | The id of a group in your phonebook.  A value can be given if the &#x60;type&#x60; is GROUP. | [optional]
**fields** | **string[]** | Custom fields that can be used in the message body. A value can be given if the &#x60;type&#x60; is INTERNATIONAL  Read the [body templates section](#tag/Message) for more information. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
