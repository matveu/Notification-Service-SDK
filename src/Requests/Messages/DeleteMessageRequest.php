<?php

namespace matviichuk\NsSdk\Requests\Messages;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class DeleteMessageRequest
 *
 * @package matviichuk\NsSdk\Requests\Messages
 */
class DeleteMessageRequest extends Request
{
    /**
     * DeleteMessageRequest constructor.
     *
     * @param string $messageId
     */
    public function __construct(string $messageId)
    {
        $this->setPath('/' . $messageId);
    }

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::DELETE, $this->prepareUrl($url));
    }
}
