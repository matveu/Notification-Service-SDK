<?php

namespace matviichuk\NsSdk\Exceptions\HttpClient;

use Psr\Http\Message\ResponseInterface;

/**
 * Class ServerHttpException
 *
 * @package matviichuk\NsSdk\Exceptions\HttpClient
 */
class ServerHttpException extends HttpClientException
{
    /**
     * ServerHttpException constructor.
     *
     * @param ResponseInterface|null $response
     */
    public function __construct(ResponseInterface $response = null)
    {
        $this->init($response);
        parent::__construct('An unexpected error');
    }
}
