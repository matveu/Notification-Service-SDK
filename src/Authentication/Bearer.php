<?php

namespace matviichuk\NsSdk\Authentication;

/**
 * Class Bearer
 *
 * @package matviichuk\NsSdk\Authentication
 */
class Bearer implements AuthenticationInterface
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $expired;

    /**
     * Bearer constructor.
     *
     * @param string $token
     * @param string $expired
     */
    public function __construct(string $token, string $expired = '')
    {
        $this->token   = $token;
        $this->expired = $expired;
    }

    /**
     * @return string
     */
    public function getToken() : string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getExpiresIn() : string
    {
        return $this->expired;
    }
}
