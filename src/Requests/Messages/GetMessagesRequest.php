<?php

namespace matviichuk\NsSdk\Requests\Messages;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Messages\Messages;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetMessagesRequest
 *
 * @package matviichuk\NsSdk\Requests\Messages
 */
class GetMessagesRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Messages::class;

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
