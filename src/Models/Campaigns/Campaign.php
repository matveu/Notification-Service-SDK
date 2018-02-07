<?php

namespace matviichuk\NsSdk\Models\Campaigns;

use matviichuk\NsSdk\Models\Model;

/**
 * Class Campaign
 *
 * @package matviichuk\NsSdk\Models\Campaigns
 */
class Campaign extends Model
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
    protected $providerId;

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
            'provider_id' => function ($data) {
                return (int)$data['provider_id'];
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
    public function getProviderId() : int
    {
        return $this->providerId;
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
