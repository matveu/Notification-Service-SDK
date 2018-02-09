<?php

namespace matviichuk\NsSdk\Requests\Groups;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Groups\Groups;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetGroupsRequest
 *
 * @package matviichuk\NsSdk\Requests\Groups
 */
class GetGroupsRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Groups::class;

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
