<?php
/**
 * SubmissionEntry
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  BulkSMS
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

namespace BulkSMS\Model;

use \ArrayAccess;
use \BulkSMS\ObjectSerializer;

/**
 * SubmissionEntry Class Doc Comment
 *
 * @category Class
 * @description An object that you use when posting messages.
 * @package  BulkSMS
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SubmissionEntry implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SubmissionEntry';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'from' => '\BulkSMS\Model\SubmissionEntryFrom',
        'to' => '\BulkSMS\Model\SubmissionEntryToInner[]',
        'routing_group' => 'string',
        'encoding' => 'string',
        'long_message_max_parts' => 'int',
        'body' => 'string',
        'user_supplied_id' => 'string',
        'protocol_id' => 'string',
        'message_class' => 'string',
        'delivery_reports' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'from' => null,
        'to' => null,
        'routing_group' => null,
        'encoding' => null,
        'long_message_max_parts' => 'int32',
        'body' => null,
        'user_supplied_id' => null,
        'protocol_id' => null,
        'message_class' => null,
        'delivery_reports' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'from' => false,
		'to' => false,
		'routing_group' => false,
		'encoding' => false,
		'long_message_max_parts' => false,
		'body' => false,
		'user_supplied_id' => false,
		'protocol_id' => false,
		'message_class' => false,
		'delivery_reports' => false
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
        'from' => 'from',
        'to' => 'to',
        'routing_group' => 'routingGroup',
        'encoding' => 'encoding',
        'long_message_max_parts' => 'longMessageMaxParts',
        'body' => 'body',
        'user_supplied_id' => 'userSuppliedId',
        'protocol_id' => 'protocolId',
        'message_class' => 'messageClass',
        'delivery_reports' => 'deliveryReports'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'from' => 'setFrom',
        'to' => 'setTo',
        'routing_group' => 'setRoutingGroup',
        'encoding' => 'setEncoding',
        'long_message_max_parts' => 'setLongMessageMaxParts',
        'body' => 'setBody',
        'user_supplied_id' => 'setUserSuppliedId',
        'protocol_id' => 'setProtocolId',
        'message_class' => 'setMessageClass',
        'delivery_reports' => 'setDeliveryReports'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'from' => 'getFrom',
        'to' => 'getTo',
        'routing_group' => 'getRoutingGroup',
        'encoding' => 'getEncoding',
        'long_message_max_parts' => 'getLongMessageMaxParts',
        'body' => 'getBody',
        'user_supplied_id' => 'getUserSuppliedId',
        'protocol_id' => 'getProtocolId',
        'message_class' => 'getMessageClass',
        'delivery_reports' => 'getDeliveryReports'
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

    public const ROUTING_GROUP_ECONOMY = 'ECONOMY';
    public const ROUTING_GROUP_STANDARD = 'STANDARD';
    public const ROUTING_GROUP_PREMIUM = 'PREMIUM';
    public const ENCODING_TEXT = 'TEXT';
    public const ENCODING_UNICODE = 'UNICODE';
    public const ENCODING_BINARY = 'BINARY';
    public const PROTOCOL_ID_IMPLICIT = 'IMPLICIT';
    public const PROTOCOL_ID_SHORT_MESSAGE_TYPE_0 = 'SHORT_MESSAGE_TYPE_0';
    public const PROTOCOL_ID_REPLACE_MESSAGE_1 = 'REPLACE_MESSAGE_1';
    public const PROTOCOL_ID_REPLACE_MESSAGE_2 = 'REPLACE_MESSAGE_2';
    public const PROTOCOL_ID_REPLACE_MESSAGE_3 = 'REPLACE_MESSAGE_3';
    public const PROTOCOL_ID_REPLACE_MESSAGE_4 = 'REPLACE_MESSAGE_4';
    public const PROTOCOL_ID_REPLACE_MESSAGE_5 = 'REPLACE_MESSAGE_5';
    public const PROTOCOL_ID_REPLACE_MESSAGE_6 = 'REPLACE_MESSAGE_6';
    public const PROTOCOL_ID_REPLACE_MESSAGE_7 = 'REPLACE_MESSAGE_7';
    public const PROTOCOL_ID_RETURN_CALL = 'RETURN_CALL';
    public const PROTOCOL_ID_ME_DOWNLOAD = 'ME_DOWNLOAD';
    public const PROTOCOL_ID_ME_DEPERSONALIZE = 'ME_DEPERSONALIZE';
    public const PROTOCOL_ID_SIM_DOWNLOAD = 'SIM_DOWNLOAD';
    public const MESSAGE_CLASS_FLASH_SMS = 'FLASH_SMS';
    public const MESSAGE_CLASS_ME_SPECIFIC = 'ME_SPECIFIC';
    public const MESSAGE_CLASS_SIM_SPECIFIC = 'SIM_SPECIFIC';
    public const MESSAGE_CLASS_TE_SPECIFIC = 'TE_SPECIFIC';
    public const DELIVERY_REPORTS_ALL = 'ALL';
    public const DELIVERY_REPORTS_ERRORS = 'ERRORS';
    public const DELIVERY_REPORTS_NONE = 'NONE';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRoutingGroupAllowableValues()
    {
        return [
            self::ROUTING_GROUP_ECONOMY,
            self::ROUTING_GROUP_STANDARD,
            self::ROUTING_GROUP_PREMIUM,
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
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getProtocolIdAllowableValues()
    {
        return [
            self::PROTOCOL_ID_IMPLICIT,
            self::PROTOCOL_ID_SHORT_MESSAGE_TYPE_0,
            self::PROTOCOL_ID_REPLACE_MESSAGE_1,
            self::PROTOCOL_ID_REPLACE_MESSAGE_2,
            self::PROTOCOL_ID_REPLACE_MESSAGE_3,
            self::PROTOCOL_ID_REPLACE_MESSAGE_4,
            self::PROTOCOL_ID_REPLACE_MESSAGE_5,
            self::PROTOCOL_ID_REPLACE_MESSAGE_6,
            self::PROTOCOL_ID_REPLACE_MESSAGE_7,
            self::PROTOCOL_ID_RETURN_CALL,
            self::PROTOCOL_ID_ME_DOWNLOAD,
            self::PROTOCOL_ID_ME_DEPERSONALIZE,
            self::PROTOCOL_ID_SIM_DOWNLOAD,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMessageClassAllowableValues()
    {
        return [
            self::MESSAGE_CLASS_FLASH_SMS,
            self::MESSAGE_CLASS_ME_SPECIFIC,
            self::MESSAGE_CLASS_SIM_SPECIFIC,
            self::MESSAGE_CLASS_TE_SPECIFIC,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDeliveryReportsAllowableValues()
    {
        return [
            self::DELIVERY_REPORTS_ALL,
            self::DELIVERY_REPORTS_ERRORS,
            self::DELIVERY_REPORTS_NONE,
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
        $this->setIfExists('from', $data ?? [], null);
        $this->setIfExists('to', $data ?? [], null);
        $this->setIfExists('routing_group', $data ?? [], null);
        $this->setIfExists('encoding', $data ?? [], null);
        $this->setIfExists('long_message_max_parts', $data ?? [], null);
        $this->setIfExists('body', $data ?? [], null);
        $this->setIfExists('user_supplied_id', $data ?? [], null);
        $this->setIfExists('protocol_id', $data ?? [], null);
        $this->setIfExists('message_class', $data ?? [], null);
        $this->setIfExists('delivery_reports', $data ?? [], null);
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

        if ($this->container['to'] === null) {
            $invalidProperties[] = "'to' can't be null";
        }
        $allowedValues = $this->getRoutingGroupAllowableValues();
        if (!is_null($this->container['routing_group']) && !in_array($this->container['routing_group'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'routing_group', must be one of '%s'",
                $this->container['routing_group'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getEncodingAllowableValues();
        if (!is_null($this->container['encoding']) && !in_array($this->container['encoding'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'encoding', must be one of '%s'",
                $this->container['encoding'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['body'] === null) {
            $invalidProperties[] = "'body' can't be null";
        }
        $allowedValues = $this->getProtocolIdAllowableValues();
        if (!is_null($this->container['protocol_id']) && !in_array($this->container['protocol_id'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'protocol_id', must be one of '%s'",
                $this->container['protocol_id'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getMessageClassAllowableValues();
        if (!is_null($this->container['message_class']) && !in_array($this->container['message_class'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'message_class', must be one of '%s'",
                $this->container['message_class'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDeliveryReportsAllowableValues();
        if (!is_null($this->container['delivery_reports']) && !in_array($this->container['delivery_reports'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'delivery_reports', must be one of '%s'",
                $this->container['delivery_reports'],
                implode("', '", $allowedValues)
            );
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
     * Gets from
     *
     * @return \BulkSMS\Model\SubmissionEntryFrom|null
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     *
     * @param \BulkSMS\Model\SubmissionEntryFrom|null $from from
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
     * @return \BulkSMS\Model\SubmissionEntryToInner[]
     */
    public function getTo()
    {
        return $this->container['to'];
    }

    /**
     * Sets to
     *
     * @param \BulkSMS\Model\SubmissionEntryToInner[] $to Identifies the recipients  Instead of an array of structured objects, you can also provide a single object, a simple string or an array of strings. If you supply a string, the `type` is taken as INTERNATIONAL.
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
     * Gets routing_group
     *
     * @return string|null
     */
    public function getRoutingGroup()
    {
        return $this->container['routing_group'];
    }

    /**
     * Sets routing_group
     *
     * @param string|null $routing_group Allows you to choose routing. The default is STANDARD.
     *
     * @return self
     */
    public function setRoutingGroup($routing_group)
    {
        if (is_null($routing_group)) {
            throw new \InvalidArgumentException('non-nullable routing_group cannot be null');
        }
        $allowedValues = $this->getRoutingGroupAllowableValues();
        if (!in_array($routing_group, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'routing_group', must be one of '%s'",
                    $routing_group,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['routing_group'] = $routing_group;

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
     * @param string|null $encoding Describes the content of the message body.  Typically this is TEXT, which is the default if no value is provided.  If you need to send characters that are not covered by the [GSM 03.38](https://en.wikipedia.org/wiki/GSM_03.38) character set you will need to specify UNICODE.  If you want to send a sequence of bytes, you must use BINARY.  You can also or use the `auto-unicode` parameter of the Send Messages Operation.     If you supply the value of `TEXT` while `auto-unicode` is `true` then your message may be converted to `UNICODE`.  If you supply a value other than `TEXT` for this property while `auto-unicode` is `true` then no automatic conversion will take place.
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
     * Gets long_message_max_parts
     *
     * @return int|null
     */
    public function getLongMessageMaxParts()
    {
        return $this->container['long_message_max_parts'];
    }

    /**
     * Sets long_message_max_parts
     *
     * @param int|null $long_message_max_parts The maximum number of message parts that can be used for a [concatenated message](https://en.wikipedia.org/wiki/Concatenated_SMS). The default is `3`.
     *
     * @return self
     */
    public function setLongMessageMaxParts($long_message_max_parts)
    {
        if (is_null($long_message_max_parts)) {
            throw new \InvalidArgumentException('non-nullable long_message_max_parts cannot be null');
        }
        $this->container['long_message_max_parts'] = $long_message_max_parts;

        return $this;
    }

    /**
     * Gets body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->container['body'];
    }

    /**
     * Sets body
     *
     * @param string $body The message content as described in the `encoding`. If the `encoding` is BINARY, the body must contain only hexadecimal digits where one byte is represented as two digits. For example, if you want to send two bytes '0x05' and '0x1F', the message body must contain the text '051F'.  The message content can also contain templates, read the [body templates section](#tag/Message) for more information.
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
     * @param string|null $user_supplied_id Correlate the messages created from this submission to your data.  The value can contain no more than 20 characters.
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
     * Gets protocol_id
     *
     * @return string|null
     */
    public function getProtocolId()
    {
        return $this->container['protocol_id'];
    }

    /**
     * Sets protocol_id
     *
     * @param string|null $protocol_id The TP-PID value from GSM 03.40[.750] §9.2.3.9.  You can provide either an integer value, or a mnemonic string.  If unspecified, this property defaults to `0`, representing the IMPLICIT value. Numeric values are listed below | Name | Value| |----- |------| | IMPLICIT              | 00 | | SHORT_MESSAGE_TYPE_0  | 64 | | REPLACE_MESSAGE_1     | 65 | | REPLACE_MESSAGE_2     | 66 | | REPLACE_MESSAGE_3     | 67 | | REPLACE_MESSAGE_4     | 68 | | REPLACE_MESSAGE_5     | 69 | | REPLACE_MESSAGE_6     | 70 | | REPLACE_MESSAGE_7     | 71 | | RETURN_CALL           | 95 | | ME_DOWNLOAD           | 125 | | ME_DEPERSONALIZE      | 126 | | SIM_DOWNLOAD          | 127 |
     *
     * @return self
     */
    public function setProtocolId($protocol_id)
    {
        if (is_null($protocol_id)) {
            throw new \InvalidArgumentException('non-nullable protocol_id cannot be null');
        }
        $allowedValues = $this->getProtocolIdAllowableValues();
        if (!in_array($protocol_id, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'protocol_id', must be one of '%s'",
                    $protocol_id,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['protocol_id'] = $protocol_id;

        return $this;
    }

    /**
     * Gets message_class
     *
     * @return string|null
     */
    public function getMessageClass()
    {
        return $this->container['message_class'];
    }

    /**
     * Sets message_class
     *
     * @param string|null $message_class The class of the message, as specified by §4 of the GSM 03.38 specification.  You can provide either an integer value, or a mnemonic string.  The default value is SIM_SPECIFIC. Numeric values are | Name | Value| |------|------| | FLASH_SMS | 0      | | ME_SPECIFIC | 1    | | SIM_SPECIFIC | 2   | | TE_SPECIFIC | 3   |
     *
     * @return self
     */
    public function setMessageClass($message_class)
    {
        if (is_null($message_class)) {
            throw new \InvalidArgumentException('non-nullable message_class cannot be null');
        }
        $allowedValues = $this->getMessageClassAllowableValues();
        if (!in_array($message_class, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'message_class', must be one of '%s'",
                    $message_class,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['message_class'] = $message_class;

        return $this;
    }

    /**
     * Gets delivery_reports
     *
     * @return string|null
     */
    public function getDeliveryReports()
    {
        return $this->container['delivery_reports'];
    }

    /**
     * Sets delivery_reports
     *
     * @param string|null $delivery_reports The type of delivery reports to request from the delivering network. The default value  is `ALL`. Please note that not all networks support delivery reports. ALL. All possible delivery reports ERRORS. Only error delivery reports NONE. No delivery reports
     *
     * @return self
     */
    public function setDeliveryReports($delivery_reports)
    {
        if (is_null($delivery_reports)) {
            throw new \InvalidArgumentException('non-nullable delivery_reports cannot be null');
        }
        $allowedValues = $this->getDeliveryReportsAllowableValues();
        if (!in_array($delivery_reports, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'delivery_reports', must be one of '%s'",
                    $delivery_reports,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['delivery_reports'] = $delivery_reports;

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


