<?php

namespace matviichuk\NsSdk\Requests\Messages;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class SendMessageRequest
 *
 * @package matviichuk\NsSdk\Requests\Messages
 */
class SendMessageRequest extends Request
{
    /**
     * SendMessageRequest constructor.
     *
     * @param string $messageId
     */
    public function __construct(string $messageId)
    {
        $this->setPath('/send/' . $messageId);
    }

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::POST, $this->prepareUrl($url));
    }
}
