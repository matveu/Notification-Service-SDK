<?php

namespace matviichuk\NsSdk\Models\Messages;

use matviichuk\NsSdk\Models\Model;

/**
 * Class MessageStatistic
 *
 * @package matviichuk\NsSdk\Models\Messages
 */
class MessageStatistic extends Model
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $messageId;

    /**
     * @var int
     */
    protected $customerId;

    /**
     * @var int
     */
    protected $providerMessageId;

    /**
     * @var int
     */
    protected $providerId;

    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var int
     */
    protected $timeSend;

    /**
     * @var int
     */
    protected $timeReceive;

    /**
     * @var string
     */
    protected $response;

    /**
     * @inheritdoc
     */
    protected function getAttributeMap() : array
    {
        return [
            'id',
            'message_id'          => function ($data) {
                return $data['message_id'] ? (int)$data['message_id'] : null;
            },
            'provider_message_id' => function ($data) {
                return $data['provider_message_id'] ? (int)$data['provider_message_id'] : null;
            },
            'provider_id'         => function ($data) {
                return $data['provider_id'] ? (int)$data['provider_id'] : null;
            },
            'customer_id'         => function ($data) {
                return $data['customer_id'] ? (int)$data['customer_id'] : null;
            },
            'response'            => function ($data) {
                return $data['response'] ? (string)$data['response'] : null;
            },
            'status_code',
            'time_send',
            'time_receive',
        ];
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getMessageId() : int
    {
        return $this->messageId;
    }

    /**
     * @return int
     */
    public function getCustomerId() : int
    {
        return $this->customerId;
    }

    /**
     * @return string
     */
    public function getResponse() : string
    {
        return $this->response;
    }

    /**
     * @return int
     */
    public function getProviderMessageId() : int
    {
        return $this->providerMessageId;
    }

    /**
     * @return int
     */
    public function getProviderId() : int
    {
        return $this->providerId;
    }

    /**
     * @return int
     */
    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    /**
     * @return int
     */
    public function getTimeSend() : int
    {
        return $this->timeSend;
    }

    /**
     * @return int
     */
    public function getTimeReceive() : int
    {
        return $this->timeReceive;
    }
}
