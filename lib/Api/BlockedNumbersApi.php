<?php
/**
 * BlockedNumbersApi
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

namespace BulkSMS\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use BulkSMS\ApiException;
use BulkSMS\Configuration;
use BulkSMS\HeaderSelector;
use BulkSMS\ObjectSerializer;

/**
 * BlockedNumbersApi Class Doc Comment
 *
 * @category Class
 * @package  BulkSMS
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class BlockedNumbersApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'blockedNumbersGet' => [
            'application/json',
        ],
        'blockedNumbersPost' => [
            'application/json',
        ],
    ];

/**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation blockedNumbersGet
     *
     * List blocked numbers
     *
     * @param  mixed $min_id Records with an &#x60;id&#x60; that is greater or equal to min-id will be returned. The default value is &#x60;0&#x60;.  You can add 1 to an id that you previously retrieved, to return subsequent records. (optional)
     * @param  mixed $limit The maximum number of records to return. The default value is &#x60;10000&#x60;. The value cannot be greater than 10000. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blockedNumbersGet'] to see the possible values for this operation
     *
     * @throws \BulkSMS\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \BulkSMS\Model\BlockedNumber
     */
    public function blockedNumbersGet($min_id = null, $limit = null, string $contentType = self::contentTypes['blockedNumbersGet'][0])
    {
        list($response) = $this->blockedNumbersGetWithHttpInfo($min_id, $limit, $contentType);
        return $response;
    }

    /**
     * Operation blockedNumbersGetWithHttpInfo
     *
     * List blocked numbers
     *
     * @param  mixed $min_id Records with an &#x60;id&#x60; that is greater or equal to min-id will be returned. The default value is &#x60;0&#x60;.  You can add 1 to an id that you previously retrieved, to return subsequent records. (optional)
     * @param  mixed $limit The maximum number of records to return. The default value is &#x60;10000&#x60;. The value cannot be greater than 10000. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blockedNumbersGet'] to see the possible values for this operation
     *
     * @throws \BulkSMS\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \BulkSMS\Model\BlockedNumber, HTTP status code, HTTP response headers (array of strings)
     */
    public function blockedNumbersGetWithHttpInfo($min_id = null, $limit = null, string $contentType = self::contentTypes['blockedNumbersGet'][0])
    {
        $request = $this->blockedNumbersGetRequest($min_id, $limit, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\BulkSMS\Model\BlockedNumber' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\BulkSMS\Model\BlockedNumber' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\BulkSMS\Model\BlockedNumber', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\BulkSMS\Model\BlockedNumber';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\BulkSMS\Model\BlockedNumber',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation blockedNumbersGetAsync
     *
     * List blocked numbers
     *
     * @param  mixed $min_id Records with an &#x60;id&#x60; that is greater or equal to min-id will be returned. The default value is &#x60;0&#x60;.  You can add 1 to an id that you previously retrieved, to return subsequent records. (optional)
     * @param  mixed $limit The maximum number of records to return. The default value is &#x60;10000&#x60;. The value cannot be greater than 10000. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blockedNumbersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function blockedNumbersGetAsync($min_id = null, $limit = null, string $contentType = self::contentTypes['blockedNumbersGet'][0])
    {
        return $this->blockedNumbersGetAsyncWithHttpInfo($min_id, $limit, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation blockedNumbersGetAsyncWithHttpInfo
     *
     * List blocked numbers
     *
     * @param  mixed $min_id Records with an &#x60;id&#x60; that is greater or equal to min-id will be returned. The default value is &#x60;0&#x60;.  You can add 1 to an id that you previously retrieved, to return subsequent records. (optional)
     * @param  mixed $limit The maximum number of records to return. The default value is &#x60;10000&#x60;. The value cannot be greater than 10000. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blockedNumbersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function blockedNumbersGetAsyncWithHttpInfo($min_id = null, $limit = null, string $contentType = self::contentTypes['blockedNumbersGet'][0])
    {
        $returnType = '\BulkSMS\Model\BlockedNumber';
        $request = $this->blockedNumbersGetRequest($min_id, $limit, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'blockedNumbersGet'
     *
     * @param  mixed $min_id Records with an &#x60;id&#x60; that is greater or equal to min-id will be returned. The default value is &#x60;0&#x60;.  You can add 1 to an id that you previously retrieved, to return subsequent records. (optional)
     * @param  mixed $limit The maximum number of records to return. The default value is &#x60;10000&#x60;. The value cannot be greater than 10000. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blockedNumbersGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function blockedNumbersGetRequest($min_id = null, $limit = null, string $contentType = self::contentTypes['blockedNumbersGet'][0])
    {




        $resourcePath = '/blocked-numbers';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $min_id,
            'min-id', // param base name
            'mixed', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'mixed', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if (!empty($this->config->getUsername()) || !(empty($this->config->getPassword()))) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation blockedNumbersPost
     *
     * Create a blocked number
     *
     * @param  string[] $body Maximum size: &#x60;1000&#x60; items (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blockedNumbersPost'] to see the possible values for this operation
     *
     * @throws \BulkSMS\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function blockedNumbersPost($body, string $contentType = self::contentTypes['blockedNumbersPost'][0])
    {
        $this->blockedNumbersPostWithHttpInfo($body, $contentType);
    }

    /**
     * Operation blockedNumbersPostWithHttpInfo
     *
     * Create a blocked number
     *
     * @param  string[] $body Maximum size: &#x60;1000&#x60; items (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blockedNumbersPost'] to see the possible values for this operation
     *
     * @throws \BulkSMS\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function blockedNumbersPostWithHttpInfo($body, string $contentType = self::contentTypes['blockedNumbersPost'][0])
    {
        $request = $this->blockedNumbersPostRequest($body, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation blockedNumbersPostAsync
     *
     * Create a blocked number
     *
     * @param  string[] $body Maximum size: &#x60;1000&#x60; items (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blockedNumbersPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function blockedNumbersPostAsync($body, string $contentType = self::contentTypes['blockedNumbersPost'][0])
    {
        return $this->blockedNumbersPostAsyncWithHttpInfo($body, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation blockedNumbersPostAsyncWithHttpInfo
     *
     * Create a blocked number
     *
     * @param  string[] $body Maximum size: &#x60;1000&#x60; items (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blockedNumbersPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function blockedNumbersPostAsyncWithHttpInfo($body, string $contentType = self::contentTypes['blockedNumbersPost'][0])
    {
        $returnType = '';
        $request = $this->blockedNumbersPostRequest($body, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'blockedNumbersPost'
     *
     * @param  string[] $body Maximum size: &#x60;1000&#x60; items (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['blockedNumbersPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function blockedNumbersPostRequest($body, string $contentType = self::contentTypes['blockedNumbersPost'][0])
    {

        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling blockedNumbersPost'
            );
        }


        $resourcePath = '/blocked-numbers';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($body)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($body));
            } else {
                $httpBody = $body;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if (!empty($this->config->getUsername()) || !(empty($this->config->getPassword()))) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
