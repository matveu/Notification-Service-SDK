<?php

namespace matviichuk\NsSdk\Requests\Groups;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class DeleteGroupRequest
 *
 * @package matviichuk\NsSdk\Requests\Groups
 */
class DeleteGroupRequest extends Request
{
    /**
     * DeleteGroupRequest constructor.
     *
     * @param string $groupId
     */
    public function __construct(string $groupId)
    {
        $this->setPath('/' . $groupId);
    }

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::DELETE, $this->prepareUrl($url));
    }
}
