<?php

namespace matviichuk\NsSdk\Resources;

use GuzzleHttp\ClientInterface;
use matviichuk\NsSdk\Requests\RequestInterface;

/**
 * Interface ResourceInterface
 *
 * @package matviichuk\NsSdk\Resources
 */
interface ResourceInterface
{
    /**
     * @return string
     */
    public function getResourcePath() : string;

    /**
     * @param RequestInterface $request
     * @param ClientInterface  $httpClient
     *
     * @return mixed
     */
    public function execute(RequestInterface $request, ClientInterface $httpClient);
}
