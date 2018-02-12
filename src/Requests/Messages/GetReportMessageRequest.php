<?php

namespace matviichuk\NsSdk\Requests\Messages;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Messages\MessagesStatistic;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetReportMessageRequest
 *
 * @package matviichuk\NsSdk\Requests\Messages
 */
class GetReportMessageRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = MessagesStatistic::class;

    /**
     * GetReportMessageRequest constructor.
     *
     * @param string $messageId
     */
    public function __construct(string $messageId)
    {
        $this->setPath('/report/' . $messageId);
    }

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
