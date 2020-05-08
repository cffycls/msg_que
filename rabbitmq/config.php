<?php
define('HOST', getenv('TEST_RABBITMQ_HOST') ? getenv('TEST_RABBITMQ_HOST') : '172.1.12.15');
define('PORT', getenv('TEST_RABBITMQ_PORT') ? getenv('TEST_RABBITMQ_PORT') : 5672);
define('USER', getenv('TEST_RABBITMQ_USER') ? getenv('TEST_RABBITMQ_USER') : 'root');
define('PASS', getenv('TEST_RABBITMQ_PASS') ? getenv('TEST_RABBITMQ_PASS') : '123456');
define('VHOST', '/');
define('AMQP_DEBUG', getenv('TEST_AMQP_DEBUG') !== false ? (bool)getenv('TEST_AMQP_DEBUG') : false);

include_once __DIR__.'/vendor/autoload.php';