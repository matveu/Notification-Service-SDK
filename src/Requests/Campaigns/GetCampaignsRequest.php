<?php

namespace matviichuk\NsSdk\Requests\Campaigns;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Campaigns\Campaigns;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetCampaignsRequest
 *
 * @package matviichuk\NsSdk\Requests\Campaigns
 */
class GetCampaignsRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Campaigns::class;

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
