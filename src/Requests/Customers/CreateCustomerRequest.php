<?php

namespace matviichuk\NsSdk\Requests\Customers;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class CreateCustomerRequest
 *
 * @package matviichuk\NsSdk\Requests\Customers
 */
class CreateCustomerRequest extends Request
{
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
    protected $groupId;

    /**
     * @inheritdoc
     */
    protected $requestFields = [
        'firstName',
        'lastName',
        'email',
        'phone',
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
    public function getFirstName() : string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName() : string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone() : string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
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
}
