<?php

namespace matviichuk\NsSdk\Models\Groups;

use matviichuk\NsSdk\Models\Model;

/**
 * Class Group
 *
 * @package matviichuk\NsSdk\Models\Groups
 */
class Group extends Model
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $campaignId;

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
            'name',
            'campaign_id' => function ($data) {
                return (int)$data['campaign_id'];
            },
            'created_at',
            'created_by',
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
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
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
