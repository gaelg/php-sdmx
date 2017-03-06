<?php

namespace Sdmx\api\client\http;


use Requests;

class RequestHttpClient implements HttpClient
{
    /**
     * @var array $predefinedHeaders
     */
    private $predefinedHeaders = [];

    /**
     * @param string $url
     * @param array $headers
     * @param array $options
     * @return string
     */
    public function get($url, $headers = array('Accept' => 'application/xml', 'Accept-Encoding' => 'gzip'), $options = array())
    {
        $headersToSend = array_merge($this->predefinedHeaders, $headers);
        $response =  Requests::get($url, $headersToSend, $options);

        return $response->body;
    }

    /**
     * @param array $headers
     */
    public function setPredefinedHeaders(array $headers)
    {
        $this->predefinedHeaders = $headers;
    }
}