<?php

namespace matviichuk\NsSdk\Exceptions\HttpClient;

use Psr\Http\Message\ResponseInterface;

/**
 * Class BadRequestHttpException
 *
 * @package matviichuk\NsSdk\Exceptions\HttpClient
 */
class BadRequestHttpException extends HttpClientException
{
    /**
     * BadRequestHttpException constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response = null)
    {
        $this->init($response);

        $body = $this->getResponseBody();

        parent::__construct($body['error']['message'] ?? 'Bad request', $body['error']['code'] ?? 0);
    }
}
