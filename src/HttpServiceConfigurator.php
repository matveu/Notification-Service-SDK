<?php

namespace matviichuk\NsSdk;

use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;
use matviichuk\NsSdk\Authentication\AuthenticationInterface;
use Closure;
use matviichuk\NsSdk\Exceptions\HttpClientConfiguratorException;

/**
 * Class HttpServiceConfigurator
 *
 * @package matviichuk\NsSdk
 */
class HttpServiceConfigurator
{
    /**
     * @var string
     */
    private $endpoint = 'http://api.ns.slg.tools/v1/';

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var string
     */
    private $token;

    /**
     * @var HandlerStack
     */
    private $stack;

    /**
     *  return ClientInterface
     */
    public function initHttpClient()
    {
        if (!$this->endpoint) {
            throw new HttpClientConfiguratorException('Endpoint must be set.');
        }

        $this->setHttpClient($this->createHttpClient());
    }

    /**
     * @param string $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return array
     */
    private function getDefaultConfig() : array
    {
        return [
            'handler'         => $this->stack,
            'base_uri'        => $this->endpoint,
            'headers'         => ['Content-Type' => 'application/json'],
            'verify'          => false,
            'connect_timeout' => 30,
            'timeout'         => 30,
        ];
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient() : ClientInterface
    {
        if ($this->httpClient === null) {
            $this->initHttpClient();
        }

        return $this->httpClient;
    }

    /**
     * @param ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param AuthenticationInterface $auth
     */
    public function setAuthentication(AuthenticationInterface $auth)
    {
        $this->token = $auth->getToken();

        $this->stack = new HandlerStack();
        $this->stack->setHandler(new CurlHandler());
        $this->stack->push($this->handleAuthorizationHeader());

        $this->initHttpClient();
    }

    /**
     * Handle Authorization Header
     */
    private function handleAuthorizationHeader() : Closure
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                if ($this->token) {
                    $request = $request->withHeader('Authorization', 'Bearer ' . $this->token);
                }

                return $handler($request, $options);
            };
        };
    }

    /**
     * @return ClientInterface
     */
    private function createHttpClient() : ClientInterface
    {
        return new Client($this->getDefaultConfig());
    }
}
