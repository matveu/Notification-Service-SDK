<?php

namespace matviichuk\NsSdk\Models\Customers;

use matviichuk\NsSdk\Models\Model;

/**
 * Class Customer
 *
 * @package matviichuk\NsSdk\Models\Customers
 */
class Customer extends Model
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $phone;

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
            'first_name',
            'last_name',
            'email',
            'phone',
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
    public function getFirstName() : string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName() : string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone() : string
    {
        return $this->phone;
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
