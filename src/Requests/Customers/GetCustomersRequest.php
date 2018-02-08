<?php

namespace matviichuk\NsSdk\Requests\Customers;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Customers\Customers;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetCustomersRequest
 *
 * @package matviichuk\NsSdk\Requests\Customers
 */
class GetCustomersRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Customers::class;

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
