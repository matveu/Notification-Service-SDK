<?php

namespace matviichuk\NsSdk\Requests\Campaigns;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Campaigns\Campaign;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetCampaignRequest
 *
 * @package matviichuk\NsSdk\Requests\Campaigns
 */
class GetCampaignRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Campaign::class;

    /**
     * GetCampaignRequest constructor.
     *
     * @param string $campaignId
     */
    public function __construct(string $campaignId)
    {
        $this->setPath('/' . $campaignId);
    }

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
