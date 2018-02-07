<?php

namespace matviichuk\NsSdk\Requests\Campaigns;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class DeleteCampaignRequest
 *
 * @package matviichuk\NsSdk\Requests\Campaigns
 */
class DeleteCampaignRequest extends Request
{
    /**
     * DeleteCampaignRequest constructor.
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
        return $httpClient->request(parent::DELETE, $this->prepareUrl($url));
    }
}
