<?php

namespace matviichuk\NsSdk\Requests;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface RequestInterface
 *
 * @package matviichuk\NsSdk\Requests
 */
interface RequestInterface
{
    const POST   = 'POST';
    const GET    = 'GET';
    const PATCH  = 'PATCH';
    const DELETE = 'DELETE';

    /**
     * @return string|null
     */
    public function getPath() : ?string;

    /**
     * @param ClientInterface $httpClient
     * @param string          $url
     *
     * @return ResponseInterface
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface;

    /**
     * @return string|null
     */
    public function getResponseClass() : ?string;

    /**
     * @return array
     */
    public function getParams() : array;
}
