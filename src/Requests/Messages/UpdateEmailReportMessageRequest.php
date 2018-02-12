<?php

namespace matviichuk\NsSdk\Requests\Messages;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class UpdateEmailReportMessageRequest
 *
 * @package matviichuk\NsSdk\Requests\Messages
 */
class UpdateEmailReportMessageRequest extends Request
{
    /**
     * UpdateEmailReportMessageRequest constructor.
     *
     * @param string $messageId
     */
    public function __construct(string $messageId)
    {
        $this->setPath('/mailerlite-statistic/' . $messageId);
    }

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
