<?php

namespace matviichuk\NsSdk\Requests\Campaigns;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Campaigns\Campaign;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class CreateCampaignRequest
 *
 * @package matviichuk\NsSdk\Requests\Campaigns
 */
class CreateCampaignRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Campaign::class;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $providerId;

    /**
     * @inheritdoc
     */
    protected $requestFields = ['name', 'providerId'];

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        $body = $this->normalize($this->getParams());

        return $httpClient->request(parent::POST, $this->prepareUrl($url), ['form_params' => $body]);
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getProviderId() : int
    {
        return $this->providerId;
    }

    /**
     * @param int $providerId
     */
    public function setProviderId(int $providerId)
    {
        $this->providerId = $providerId;
    }
}
