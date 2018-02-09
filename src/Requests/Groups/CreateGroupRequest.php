<?php

namespace matviichuk\NsSdk\Requests\Groups;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Groups\Group;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class CreateGroupRequest
 *
 * @package matviichuk\NsSdk\Requests\Groups
 */
class CreateGroupRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Group::class;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $campaignId;

    /**
     * @inheritdoc
     */
    protected $requestFields = ['name', 'campaignId'];

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
    public function getCampaignId() : int
    {
        return $this->campaignId;
    }

    /**
     * @param int $campaignId
     */
    public function setCampaignId(int $campaignId)
    {
        $this->campaignId = $campaignId;
    }
}
