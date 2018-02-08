<?php

namespace matviichuk\NsSdk\Requests\Customers;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Customers\Customer;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetCustomerRequest
 *
 * @package matviichuk\NsSdk\Requests\Customers
 */
class GetCustomerRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Customer::class;

    /**
     * GetCustomerRequest constructor.
     *
     * @param string $customerId
     */
    public function __construct(string $customerId)
    {
        $this->setPath('/' . $customerId);
    }

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
