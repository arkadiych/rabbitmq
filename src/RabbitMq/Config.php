<?php
namespace RabbitMq;

use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Config
{
    /**
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    private $channel;

    public function getChannel()
    {
        if (!isset($this->channel)) {
            $connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
            $this->channel = $connection->channel();
        }
        return $this->channel;
    }

    public function __destruct()
    {
        $this->channel->close();
    }
}