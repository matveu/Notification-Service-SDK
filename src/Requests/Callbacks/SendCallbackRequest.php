<?php

namespace matviichuk\NsSdk\Requests\Callbacks;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use matviichuk\NsSdk\Requests\Request;

/**
 * Class SendCallbackRequest
 *
 * @package matviichuk\NsSdk\Requests\Callbacks
 */
class SendCallbackRequest extends Request
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @inheritdoc
     */
    protected $requestFields = [
        'phone',
        'message',
        'lang',
    ];

    /**
     * SendCallbackRequest constructor.
     */
    public function __construct()
    {
        $this->setPath('/send');
    }

    /**
     * @inheritdoc
     */
    public function execute(ClientInterface $httpClient, string $url) : ResponseInterface
    {
        $body = $this->normalize($this->getParams());

        return $httpClient->request(parent::POST, $this->prepareUrl($url), ['form_params' => $body]);
    }

    /**
     * @return string
     */
    public function getPhone() : string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getLang() : string
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang)
    {
        $this->lang = $lang;
    }
}
