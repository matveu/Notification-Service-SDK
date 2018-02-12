<?php

namespace matviichuk\NsSdk\Requests\Messages;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Messages\Message;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetMessageRequest
 *
 * @package matviichuk\NsSdk\Requests\Messages
 */
class GetMessageRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Message::class;

    /**
     * GetMessageRequest constructor.
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
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
