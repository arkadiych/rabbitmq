<?php
require_once __DIR__ . '/bootstrap.php';

use RabbitMq\Config;
use PhpAmqpLib\Connection\AMQPConnection;

$config = new Config();
$channel = $config->getChannel();

echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

$callback = function($msg) {
    echo " [x] Received ", $msg->body, "\n";
};

//$channel->basic_consume('q', '', false, true, false, false, $callback);
$msg = $channel->basic_get('q');

if (isset($msg)) {
    echo " [x] Received ", $msg->body, "\n";
    $channel->basic_ack($msg->delivery_info['delivery_tag']);
}


//while(count($channel->callbacks)) {
//    $channel->wait();
//}
