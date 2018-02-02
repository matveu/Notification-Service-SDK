<?php

namespace matviichuk\NsSdk\Authentication;

/**
 * Interface AuthenticationInterface
 *
 * @package matviichuk\NsSdk\Authentication
 */
interface AuthenticationInterface
{
    /**
     * @return string
     */
    public function getToken() : string;

    /**
     * @return string
     */
    public function getExpiresIn() : string;
}
