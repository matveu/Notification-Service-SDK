<?php

namespace matviichuk\NsSdk\Requests\Providers;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Models\Providers\Provider;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class UpdateProviderRequest
 *
 * @package matviichuk\NsSdk\Requests\Providers
 */
class UpdateProviderRequest extends Request
{
    /**
     * @inheritdoc
     */
    protected $responseClass = Provider::class;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var boolean
     */
    protected $supportAttach;

    /**
     * @inheritdoc
     */
    protected $requestFields = ['name', 'supportAttach'];

    /**
     * UpdateProviderRequest constructor.
     *
     * @param string $providerId
     */
    public function __construct(string $providerId)
    {
        $this->setPath('/' . $providerId);
    }

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        $body = $this->normalize($this->getParams());

        return $httpClient->request(parent::PATCH, $this->prepareUrl($url), ['form_params' => $body]);
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getSupportAttach() : int
    {
        return $this->supportAttach;
    }

    /**
     * @param bool $supportAttach
     */
    public function setSupportAttach(bool $supportAttach)
    {
        $this->supportAttach = $supportAttach ? 1 : 0;
    }
}
