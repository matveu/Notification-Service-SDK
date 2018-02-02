<?php

namespace matviichuk\NsSdk;

use matviichuk\NsSdk\Auth\AuthInterface;
use matviichuk\NsSdk\Authentication\AuthenticationInterface;
use matviichuk\NsSdk\Requests\RequestInterface;
use matviichuk\NsSdk\Resources\ResourceInterface;

/**
 * Class Service
 *
 * @package matviichuk\NsSdk
 */
class Service
{
    /**
     * @var HttpServiceConfigurator
     */
    protected $httpConfigure;

    /**
     * NsSdk constructor.
     *
     * @param HttpServiceConfigurator $configure
     */
    public function __construct(HttpServiceConfigurator $configure)
    {
        $this->httpConfigure = $configure;
        $this->httpConfigure->initHttpClient();
    }

    /**
     * @param AuthInterface $auth
     *
     * @return AuthenticationInterface
     */
    public function authorization(AuthInterface $auth) : AuthenticationInterface
    {
        $auth = $auth->authorization($this->httpConfigure->getHttpClient());
        $this->httpConfigure->setAuthentication($auth);

        return $auth;
    }

    /**
     * @param ResourceInterface $resource
     * @param RequestInterface  $request
     *
     * @return mixed
     */
    public function execute(ResourceInterface $resource, RequestInterface $request)
    {
        return $resource->execute($request, $this->httpConfigure->getHttpClient());
    }
}
