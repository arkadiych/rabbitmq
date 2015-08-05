<?php
require_once __DIR__ . '/bootstrap.php';

use PhpAmqpLib\Connection\AMQPConnection;

$connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');

$channel = $connection->channel();

$channel->queue_declare('q', false, true, false, false);
$channel->exchange_declare('e', 'direct', false, true, false);
$channel->queue_bind('q', 'e', 'topic');

$channel->close();
$connection->close();