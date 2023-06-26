# # SubmissionEntryFrom

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | The type of the sender id.  If you want BulkSMS to collect replies to this message on your behalf, specify the type as REPLIABLE.  If the recipient is in a country where BulkSMS does not have a local reply number, the reply may incur costs that are more expensive than sending a local SMS in that country. If you operate a service from a shortcode in a locale that allows messaging from such a shortcode, you can specify SHORTCODE for the type. |
**address** | **string** | The address of the sender id.  The validation for this field depends on the value of the &#x60;type&#x60;. INTERNATIONAL can start with &#x60;+&#x60;. It has a maximum length of 15 digits, and has to be longer than 6 digits. ALPHANUMERIC has a maximum length of 11 characters. SHORTCODE has a maximum length of 6 digits. REPLIABLE should not specify a value here. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
