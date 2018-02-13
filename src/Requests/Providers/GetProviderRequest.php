<?php

namespace matviichuk\NsSdk\Requests\Providers;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Providers\Provider;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetProviderRequest
 *
 * @package matviichuk\NsSdk\Requests\Providers
 */
class GetProviderRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Provider::class;

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
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
