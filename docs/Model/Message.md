# # Message

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | A unique identifier that is assigned when the message is created. |
**type** | **string** | The message direction |
**from** | **string** | The address part of the sender id | [optional]
**to** | **string** | The phone number of the recipient |
**body** | **object** | The content of the message |
**encoding** | **string** | The type of the content.  See the &#x60;encoding&#x60; field for more information. | [optional]
**protocol_id** | **int** | See the &#x60;protocolId&#x60; field for more information. | [optional]
**message_class** | **int** | See the &#x60;messageClass&#x60; field for more information. | [optional]
**number_of_parts** | **int** | The number of parts.  If this is a concatenated message, the number of parts will be more than 1.  Note that this field does not have a value in the submission response. | [optional]
**credit_cost** | **float** | The cost of the message (in credits).   Note that this field does not have a value in the submission response. | [optional]
**submission** | [**\OpenAPI\Client\Model\MessageSubmission**](MessageSubmission.md) |  | [optional]
**status** | [**\OpenAPI\Client\Model\MessageStatus**](MessageStatus.md) |  |
**related_sent_message_id** | **string** | This field has a value only if the type is RECEIVED. With SMS messages, it is not possible to link a reply directly with a specific sent message.  However, if you specified &#x60;REPLIABLE&#x60; in the &#x60;from&#x60; property, BulkSMS will link any reply to the most recent message sent to a given phone number.  The &#x60;relatedSentMessageId&#x60; property keeps the information about this link.  You can use this property to derive an implicit conversation from a set of messages.   - If a received reply message has a &#x60;relatedSentMessageId&#x60;, you can use it to retrieve the last message that was sent before the reply was received.   - If you have the &#x60;id&#x60; of the sent message and you want all the received messages that relate to it, you can use the List Related Messages Operation. | [optional]
**user_supplied_id** | **string** | This is the value you supplied in the &#x60;userSuppliedId&#x60; field. Has a value only if the &#x60;type&#x60; is SENT. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
