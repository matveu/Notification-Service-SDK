<?php

namespace matviichuk\NsSdk\Exceptions\HttpClient;

use Psr\Http\Message\ResponseInterface;

/**
 * Class NotFountHttpException
 *
 * @package matviichuk\NsSdk\Exceptions\HttpClient
 */
class NotFountHttpException extends HttpClientException
{
    /**
     * NotFountHttpException constructor.
     *
     * @param ResponseInterface|null $response
     */
    public function __construct(ResponseInterface $response = null)
    {
        $this->init($response);
        parent::__construct('Not found.');
    }
}
