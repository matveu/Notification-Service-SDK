<?php

namespace matviichuk\NsSdk\Requests\Messages;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Messages\Message;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class CreateMessageRequest
 *
 * @package matviichuk\NsSdk\Requests\Messages
 */
class CreateMessageRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Message::class;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var mixed
     */
    protected $body;

    /**
     * @var string
     */
    protected $alphaName;

    /**
     * @var int
     */
    protected $groupId;

    /**
     * @var int
     */
    protected $campaignId;

    /**
     * @inheritdoc
     */
    protected $requestFields = [
        'title',
        'body',
        'alphaName',
        'campaignId',
        'groupId',
    ];

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
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getBody() : mixed
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getAlphaName() : string
    {
        return $this->alphaName;
    }

    /**
     * @param string $alphaName
     */
    public function setAlphaName(string $alphaName)
    {
        $this->alphaName = $alphaName;
    }

    /**
     * @return int
     */
    public function getGroupId() : int
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId(int $groupId)
    {
        $this->groupId = $groupId;
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
