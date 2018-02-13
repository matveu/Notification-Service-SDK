<?php

namespace matviichuk\NsSdk\Requests\Providers;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Providers\Providers;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetProvidersRequest
 *
 * @package matviichuk\NsSdk\Requests\Providers
 */
class GetProvidersRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Providers::class;

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
