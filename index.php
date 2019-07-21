<?php
use Source\Core\Bootstrap;

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require __DIR__ . '/vendor/autoload.php';

$core = new Bootstrap;
$core->run();