<?php

namespace matviichuk\NsSdk\Exceptions\HttpClient;

use Psr\Http\Message\ResponseInterface;

/**
 * Class UnauthenticatedHttpException
 *
 * @package matviichuk\NsSdk\Exceptions\HttpClient
 */
class UnauthenticatedHttpException extends HttpClientException
{
    /**
     * UnauthenticatedHttpException constructor.
     *
     * @param ResponseInterface|null $response
     */
    public function __construct(ResponseInterface $response = null)
    {
        $this->init($response);
        parent::__construct('An unexpected error');
    }
}
