<?php

namespace matviichuk\NsSdk\Requests\Customers;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class DeleteCustomerRequest
 *
 * @package matviichuk\NsSdk\Requests\Customers
 */
class DeleteCustomerRequest extends Request
{
    /**
     * DeleteCustomerRequest constructor.
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
        return $httpClient->request(parent::DELETE, $this->prepareUrl($url));
    }
}
