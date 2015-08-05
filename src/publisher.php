<?php
require_once __DIR__ . '/bootstrap.php';

use PhpAmqpLib\Message\AMQPMessage;
use RabbitMq\Config;

$config = new Config();
$channel = $config->getChannel();

$msg = new AMQPMessage('Hello World!');

$channel->basic_publish($msg, 'e', 'topic');

echo " [x] Sent 'Hello World!'\n";
