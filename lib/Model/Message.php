<?php
/**
 * Message
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * BulkSMS JSON REST API
 *
 * ## Overview  The JSON REST API allows you to submit and receive [BulkSMS](https://www.bulksms.com/) messages. You can also get access to past messages and see your account profile.  The base URL to use for this service is `https://api.bulksms.com/v1`.  The base URL cannot be used on its own; you must append a path that identifies an operation and you may have to specify some path parameters as well.  [Click here](/developer/) to go to the main BulkSMS developer site.  In order to give you an idea on how the API can be used, some JSON snippets are provided below.  Have a look at the [messages section](#tag/Message) for more information.  Probably the most simple example  ``` {     \"to\": \"+27001234567\",     \"body\": \"Hello World!\" } ```   You can send unicode automatically using the `auto-unicode` query parameter.  Alternatively, you can specify `UNICODE` for the `encoding` property in the request body.  Please note: when `auto-unicode` is specified and the value of the `encoding` property is `UNICODE`, the message will always be sent as `UNICODE`.  Here is an example that sets the `encoding` explicitly  ``` {   \"to\": \"+27001234567\",   \"body\": \"Dobrá práce! Jak se máš?\",   \"encoding\": \"UNICODE\" } ```  You can also specify a from number  ``` {     \"from\": \"+27007654321\",     \"to\": \"+27001234567\",     \"body\": \"Hello World!\" } ```  Similar to above, but repliable  ``` {     \"from\": { \"type\": \"REPLIABLE\" },     \"to\": \"+27001234567\",     \"body\": \"Hello World!\" } ```  A message to a group called Everyone  ``` {     \"to\": { \"type\": \"GROUP\", \"name\": \"Everyone\" },     \"body\": \"Hello World!\" } ```  A message to multiple recipients  ``` {     \"to\": [\"+27001234567\", \"+27002345678\", \"+27003456789\"],     \"body\": \"Happy Holidays!\" } ```  Sending more than one message in the same request  ``` [     {         \"to\": \"+27001234567\",         \"body\": \"Hello World!\"     },     {         \"to\": \"+27002345678\",         \"body\": \"Hello Universe!\"     } ] ```  **The insecure base URL `http://api.bulksms.com/v1` is deprecated** and may in future result in a `301` redirect response, or insecure requests may be rejected outright. Please use the secure (`https`) URI above.  ### HTTP Content Type  All API methods expect requests to supply a `Content-Type` header with the value `application/json`. All responses will have the `Content-Type` header set to `application/json`.  ### JSON Formatting  You are advised to format your JSON resources according to strict JSON format rules. While the API does attempt to parse strictly invalid JSON documents, doing so may lead to incorrect interpretation and unexpected results.  Good JSON libraries will produce valid JSON suitable for submission, but if you are manually generating the JSON text, be careful to follow the JSON format. This include correct escaping of control characters and double quoting of property names.  See the [JSON specification](https://tools.ietf.org/html/rfc4627) for further information.  ### Date Formatting  Dates are formatted according to ISO-8601, such as `1970-01-01T10:00:00+01:00` for 1st January 1970, 10AM UTC+1.  See the [Wikipedia ISO 8601 reference](https://en.wikipedia.org/wiki/ISO_8601) for further information.  Specifically, calendar dates are formatted with the 'extended' format `YYYY-MM-DD`. Basic format, week dates and ordinal dates are not supported. Times are also formatted in the 'extended' format `hh:mm:ss`. Hours, minutes and seconds are mandatory. Offset from UTC must be provided; this is to ensure that there is no misunderstanding regarding times provided to the API.  The format we look for is `yyyy-MM-ddThh:mm:ss[Z|[+-]hh:mm]`  Examples of valid date/times are`2011-12-31T12:00:00Z` `2011-12-31T12:00:00+02:00`  ### Entity Format Modifications  It is expected that over time some changes will be made to the request and response formats of various methods available in the API. Where possible, these will be implemented in a backwards compatible way. To make this possible you are required to ignore unknown properties. This enables the addition of information in response documents while maintaining compatibility with older clients.  ### Optional Request Entity Properties  There are many instances where requests can be made without having to specify every single property allowable in the request format. Any such optional properties are noted as such in the documentation and their default value is noted.
 *
 * The version of the OpenAPI document: 1.0.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;

use \ArrayAccess;
use \OpenAPI\Client\ObjectSerializer;

/**
 * Message Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Message implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Message';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'type' => 'string',
        'from' => 'string',
        'to' => 'string',
        'body' => 'object',
        'encoding' => 'string',
        'protocol_id' => 'int',
        'message_class' => 'int',
        'number_of_parts' => 'int',
        'credit_cost' => 'float',
        'submission' => '\OpenAPI\Client\Model\MessageSubmission',
        'status' => '\OpenAPI\Client\Model\MessageStatus',
        'related_sent_message_id' => 'string',
        'user_supplied_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'type' => null,
        'from' => null,
        'to' => null,
        'body' => null,
        'encoding' => null,
        'protocol_id' => 'int32',
        'message_class' => 'int32',
        'number_of_parts' => 'int32',
        'credit_cost' => 'float',
        'submission' => null,
        'status' => null,
        'related_sent_message_id' => null,
        'user_supplied_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'type' => false,
		'from' => false,
		'to' => false,
		'body' => false,
		'encoding' => false,
		'protocol_id' => false,
		'message_class' => false,
		'number_of_parts' => false,
		'credit_cost' => false,
		'submission' => false,
		'status' => false,
		'related_sent_message_id' => false,
		'user_supplied_id' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'type' => 'type',
        'from' => 'from',
        'to' => 'to',
        'body' => 'body',
        'encoding' => 'encoding',
        'protocol_id' => 'protocolId',
        'message_class' => 'messageClass',
        'number_of_parts' => 'numberOfParts',
        'credit_cost' => 'creditCost',
        'submission' => 'submission',
        'status' => 'status',
        'related_sent_message_id' => 'relatedSentMessageId',
        'user_supplied_id' => 'userSuppliedId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'type' => 'setType',
        'from' => 'setFrom',
        'to' => 'setTo',
        'body' => 'setBody',
        'encoding' => 'setEncoding',
        'protocol_id' => 'setProtocolId',
        'message_class' => 'setMessageClass',
        'number_of_parts' => 'setNumberOfParts',
        'credit_cost' => 'setCreditCost',
        'submission' => 'setSubmission',
        'status' => 'setStatus',
        'related_sent_message_id' => 'setRelatedSentMessageId',
        'user_supplied_id' => 'setUserSuppliedId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'type' => 'getType',
        'from' => 'getFrom',
        'to' => 'getTo',
        'body' => 'getBody',
        'encoding' => 'getEncoding',
        'protocol_id' => 'getProtocolId',
        'message_class' => 'getMessageClass',
        'number_of_parts' => 'getNumberOfParts',
        'credit_cost' => 'getCreditCost',
        'submission' => 'getSubmission',
        'status' => 'getStatus',
        'related_sent_message_id' => 'getRelatedSentMessageId',
        'user_supplied_id' => 'getUserSuppliedId'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const TYPE_SENT = 'SENT';
    public const TYPE_RECEIVED = 'RECEIVED';
    public const ENCODING_TEXT = 'TEXT';
    public const ENCODING_UNICODE = 'UNICODE';
    public const ENCODING_BINARY = 'BINARY';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_SENT,
            self::TYPE_RECEIVED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEncodingAllowableValues()
    {
        return [
            self::ENCODING_TEXT,
            self::ENCODING_UNICODE,
            self::ENCODING_BINARY,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('from', $data ?? [], null);
        $this->setIfExists('to', $data ?? [], null);
        $this->setIfExists('body', $data ?? [], null);
        $this->setIfExists('encoding', $data ?? [], null);
        $this->setIfExists('protocol_id', $data ?? [], null);
        $this->setIfExists('message_class', $data ?? [], null);
        $this->setIfExists('number_of_parts', $data ?? [], null);
        $this->setIfExists('credit_cost', $data ?? [], null);
        $this->setIfExists('submission', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('related_sent_message_id', $data ?? [], null);
        $this->setIfExists('user_supplied_id', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['to'] === null) {
            $invalidProperties[] = "'to' can't be null";
        }
        if ($this->container['body'] === null) {
            $invalidProperties[] = "'body' can't be null";
        }
        $allowedValues = $this->getEncodingAllowableValues();
        if (!is_null($this->container['encoding']) && !in_array($this->container['encoding'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'encoding', must be one of '%s'",
                $this->container['encoding'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id A unique identifier that is assigned when the message is created.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type The message direction
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets from
     *
     * @return string|null
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     *
     * @param string|null $from The address part of the sender id
     *
     * @return self
     */
    public function setFrom($from)
    {
        if (is_null($from)) {
            throw new \InvalidArgumentException('non-nullable from cannot be null');
        }
        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets to
     *
     * @return string
     */
    public function getTo()
    {
        return $this->container['to'];
    }

    /**
     * Sets to
     *
     * @param string $to The phone number of the recipient
     *
     * @return self
     */
    public function setTo($to)
    {
        if (is_null($to)) {
            throw new \InvalidArgumentException('non-nullable to cannot be null');
        }
        $this->container['to'] = $to;

        return $this;
    }

    /**
     * Gets body
     *
     * @return object
     */
    public function getBody()
    {
        return $this->container['body'];
    }

    /**
     * Sets body
     *
     * @param object $body The content of the message
     *
     * @return self
     */
    public function setBody($body)
    {
        if (is_null($body)) {
            throw new \InvalidArgumentException('non-nullable body cannot be null');
        }
        $this->container['body'] = $body;

        return $this;
    }

    /**
     * Gets encoding
     *
     * @return string|null
     */
    public function getEncoding()
    {
        return $this->container['encoding'];
    }

    /**
     * Sets encoding
     *
     * @param string|null $encoding The type of the content.  See the `encoding` field for more information.
     *
     * @return self
     */
    public function setEncoding($encoding)
    {
        if (is_null($encoding)) {
            throw new \InvalidArgumentException('non-nullable encoding cannot be null');
        }
        $allowedValues = $this->getEncodingAllowableValues();
        if (!in_array($encoding, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'encoding', must be one of '%s'",
                    $encoding,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['encoding'] = $encoding;

        return $this;
    }

    /**
     * Gets protocol_id
     *
     * @return int|null
     */
    public function getProtocolId()
    {
        return $this->container['protocol_id'];
    }

    /**
     * Sets protocol_id
     *
     * @param int|null $protocol_id See the `protocolId` field for more information.
     *
     * @return self
     */
    public function setProtocolId($protocol_id)
    {
        if (is_null($protocol_id)) {
            throw new \InvalidArgumentException('non-nullable protocol_id cannot be null');
        }
        $this->container['protocol_id'] = $protocol_id;

        return $this;
    }

    /**
     * Gets message_class
     *
     * @return int|null
     */
    public function getMessageClass()
    {
        return $this->container['message_class'];
    }

    /**
     * Sets message_class
     *
     * @param int|null $message_class See the `messageClass` field for more information.
     *
     * @return self
     */
    public function setMessageClass($message_class)
    {
        if (is_null($message_class)) {
            throw new \InvalidArgumentException('non-nullable message_class cannot be null');
        }
        $this->container['message_class'] = $message_class;

        return $this;
    }

    /**
     * Gets number_of_parts
     *
     * @return int|null
     */
    public function getNumberOfParts()
    {
        return $this->container['number_of_parts'];
    }

    /**
     * Sets number_of_parts
     *
     * @param int|null $number_of_parts The number of parts.  If this is a concatenated message, the number of parts will be more than 1.  Note that this field does not have a value in the submission response.
     *
     * @return self
     */
    public function setNumberOfParts($number_of_parts)
    {
        if (is_null($number_of_parts)) {
            throw new \InvalidArgumentException('non-nullable number_of_parts cannot be null');
        }
        $this->container['number_of_parts'] = $number_of_parts;

        return $this;
    }

    /**
     * Gets credit_cost
     *
     * @return float|null
     */
    public function getCreditCost()
    {
        return $this->container['credit_cost'];
    }

    /**
     * Sets credit_cost
     *
     * @param float|null $credit_cost The cost of the message (in credits).   Note that this field does not have a value in the submission response.
     *
     * @return self
     */
    public function setCreditCost($credit_cost)
    {
        if (is_null($credit_cost)) {
            throw new \InvalidArgumentException('non-nullable credit_cost cannot be null');
        }
        $this->container['credit_cost'] = $credit_cost;

        return $this;
    }

    /**
     * Gets submission
     *
     * @return \OpenAPI\Client\Model\MessageSubmission|null
     */
    public function getSubmission()
    {
        return $this->container['submission'];
    }

    /**
     * Sets submission
     *
     * @param \OpenAPI\Client\Model\MessageSubmission|null $submission submission
     *
     * @return self
     */
    public function setSubmission($submission)
    {
        if (is_null($submission)) {
            throw new \InvalidArgumentException('non-nullable submission cannot be null');
        }
        $this->container['submission'] = $submission;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \OpenAPI\Client\Model\MessageStatus
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \OpenAPI\Client\Model\MessageStatus $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets related_sent_message_id
     *
     * @return string|null
     */
    public function getRelatedSentMessageId()
    {
        return $this->container['related_sent_message_id'];
    }

    /**
     * Sets related_sent_message_id
     *
     * @param string|null $related_sent_message_id This field has a value only if the type is RECEIVED. With SMS messages, it is not possible to link a reply directly with a specific sent message.  However, if you specified `REPLIABLE` in the `from` property, BulkSMS will link any reply to the most recent message sent to a given phone number.  The `relatedSentMessageId` property keeps the information about this link.  You can use this property to derive an implicit conversation from a set of messages.   - If a received reply message has a `relatedSentMessageId`, you can use it to retrieve the last message that was sent before the reply was received.   - If you have the `id` of the sent message and you want all the received messages that relate to it, you can use the List Related Messages Operation.
     *
     * @return self
     */
    public function setRelatedSentMessageId($related_sent_message_id)
    {
        if (is_null($related_sent_message_id)) {
            throw new \InvalidArgumentException('non-nullable related_sent_message_id cannot be null');
        }
        $this->container['related_sent_message_id'] = $related_sent_message_id;

        return $this;
    }

    /**
     * Gets user_supplied_id
     *
     * @return string|null
     */
    public function getUserSuppliedId()
    {
        return $this->container['user_supplied_id'];
    }

    /**
     * Sets user_supplied_id
     *
     * @param string|null $user_supplied_id This is the value you supplied in the `userSuppliedId` field. Has a value only if the `type` is SENT.
     *
     * @return self
     */
    public function setUserSuppliedId($user_supplied_id)
    {
        if (is_null($user_supplied_id)) {
            throw new \InvalidArgumentException('non-nullable user_supplied_id cannot be null');
        }
        $this->container['user_supplied_id'] = $user_supplied_id;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

