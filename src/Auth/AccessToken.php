<?php

namespace matviichuk\NsSdk\Auth;

use GuzzleHttp\ClientInterface;
use Exception;
use matviichuk\NsSdk\Authentication\AuthenticationInterface;
use matviichuk\NsSdk\Authentication\Bearer;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class AccessToken
 *
 * @package matviichuk\NsSdk\Auth
 */
class AccessToken implements AuthInterface
{
    /**
     * @var string
     */
    private $url = 'auth';

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * AccessToken constructor.
     *
     * @param string $email
     * @param string $password
     */
    public function __construct(string $email, string $password)
    {
        $this->email    = $email;
        $this->password = $password;
    }

    /**
     * @param ClientInterface $httpClient
     *
     * @throws Exception
     * @return AuthenticationInterface
     */
    public function authorization(ClientInterface $httpClient) : AuthenticationInterface
    {
        $data = [
            'email'    => $this->email,
            'password' => $this->password,
        ];

        $response = $httpClient->request(Request::POST, $this->url, ['form_params' => $data]);

        if ($response->getStatusCode() !== 200) {
            throw new Exception($response);
        }

        $response = json_decode($response->getBody()->getContents());

        if (isset($response->data->token) && isset($response->data->expired)) {
            return new Bearer($response->data->token, $response->data->expired);
        }
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }
}
