<?php

namespace matviichuk\NsSdk\Requests\Groups;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Groups\Group;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class GetGroupRequest
 *
 * @package matviichuk\NsSdk\Requests\Groups
 */
class GetGroupRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Group::class;

    /**
     * GetGroupRequest constructor.
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
        return $httpClient->request(parent::GET, $this->prepareUrl($url));
    }
}
