<?php

namespace matviichuk\NsSdk\Auth;

use GuzzleHttp\ClientInterface;
use matviichuk\NsSdk\Authentication\AuthenticationInterface;

/**
 * Interface AuthInterface
 *
 * @package matviichuk\NsSdk\Auth
 */
interface AuthInterface
{
    /**
     * @param ClientInterface $httpClient
     *
     * @return AuthenticationInterface
     */
    public function authorization(ClientInterface $httpClient) : AuthenticationInterface;
}
