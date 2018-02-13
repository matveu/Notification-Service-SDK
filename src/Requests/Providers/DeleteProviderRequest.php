<?php

namespace matviichuk\NsSdk\Requests\Providers;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class DeleteProviderRequest
 *
 * @package matviichuk\NsSdk\Requests\Providers
 */
class DeleteProviderRequest extends Request
{
    /**
     * GetProviderRequest constructor.
     *
     * @param string $providerId
     */
    public function __construct(string $providerId)
    {
        $this->setPath('/' . $providerId);
    }

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::DELETE, $this->prepareUrl($url));
    }
}
