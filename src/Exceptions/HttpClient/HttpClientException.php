<?php

namespace matviichuk\NsSdk\Exceptions\HttpClient;

use Psr\Http\Message\ResponseInterface;
use Exception;

/**
 * Class HttpClientException
 *
 * @package matviichuk\NsSdk\Exceptions
 */
class HttpClientException extends Exception
{
    /**
     * @var ResponseInterface|null
     */
    private $response;

    /**
     * @var array
     */
    private $responseBody;

    /**
     * @var int
     */
    private $responseStatus;

    /**
     * @param ResponseInterface|null $response
     */
    public function init(ResponseInterface $response = null)
    {
        if ($response) {
            $this->response       = $response;
            $this->responseStatus = $response->getStatusCode();
            $body                 = $response->getBody()->__toString();
            if (strpos($response->getHeaderLine('Content-Type'), 'application/json') !== 0) {
                $this->responseBody['message'] = $body;
            } else {
                $this->responseBody = json_decode($body, true);
            }
        }
    }

    /**
     * @return ResponseInterface|null
     */
    public function getResponse() : ?ResponseInterface
    {
        return $this->response;
    }

    /**
     * @return array
     */
    public function getResponseBody() : array
    {
        return $this->responseBody;
    }

    /**
     * @return int
     */
    public function getResponseStatus() : int
    {
        return $this->responseStatus;
    }
}
