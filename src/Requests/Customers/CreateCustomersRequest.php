<?php

namespace matviichuk\NsSdk\Requests\Customers;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class CreateCustomersRequest
 *
 * @package matviichuk\NsSdk\Requests\Customers
 */
class CreateCustomersRequest extends Request
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        $body = [];

        foreach ($this->getItems() as $item) {
            $body[] = $this->normalize($item);
        }

        return $httpClient->request(parent::POST, $this->prepareUrl($url), ['form_params' => $body]);
    }

    /**
     * @return array
     */
    public function getItems() : array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items)
    {
        $this->items = $items;
    }
}
