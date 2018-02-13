<?php

namespace matviichuk\NsSdk\Models\Providers;

use matviichuk\NsSdk\Models\Model;

/**
 * Class Provider
 *
 * @package matviichuk\NsSdk\Models\Providers
 */
class Provider extends Model
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
     * @var boolean
     */
    protected $supportAttach;

    /**
     * @inheritdoc
     */
    protected function getAttributeMap() : array
    {
        return [
            'id',
            'name',
            'support_attach' => function ($data) {
                return (int)$data['support_attach'] === 1;
            },
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
     * @return boolean
     */
    public function getSupportAttach() : boolean
    {
        return $this->supportAttach;
    }
}
