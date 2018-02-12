<?php

namespace matviichuk\NsSdk\Models\Messages;

use matviichuk\NsSdk\Models\Model;

/**
 * Class Message
 *
 * @package matviichuk\NsSdk\Models\Messages
 */
class Message extends Model
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $campaignId;

    /**
     * @var int
     */
    protected $groupId;

    /**
     * @var mixed
     */
    protected $body;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alphaName;

    /**
     * @var int
     */
    protected $createdAt;

    /**
     * @var int
     */
    protected $createdBy;

    /**
     * @inheritdoc
     */
    protected function getAttributeMap() : array
    {
        return [
            'id',
            'campaign_id' => function ($data) {
                return (int)$data['campaign_id'];
            },
            'group_id'    => function ($data) {
                return (int)$data['group_id'];
            },
            'created_at',
            'created_by',
            'body',
            'title',
            'alpha_name',
        ];
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCampaignId() : int
    {
        return $this->campaignId;
    }

    /**
     * @return int
     */
    public function getGroupId() : int
    {
        return $this->groupId;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAlphaName() : string
    {
        return $this->alphaName;
    }

    /**
     * @return mixed
     */
    public function getBody() : mixed
    {
        return $this->body;
    }

    /**
     * @return int
     */
    public function getCreatedAt() : int
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getCreatedBy() : int
    {
        return $this->createdBy;
    }
}
