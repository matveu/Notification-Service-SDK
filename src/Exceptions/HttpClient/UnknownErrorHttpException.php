<?php

namespace matviichuk\NsSdk\Exceptions\HttpClient;

use Psr\Http\Message\ResponseInterface;

class UnknownErrorHttpException extends HttpClientException
{
    /**
     * ServerHttpException constructor.
     *
     * @param ResponseInterface|null $response
     */
    public function __construct(ResponseInterface $response = null)
    {
        $this->init($response);
        parent::__construct('Unknown error.');
    }
}
