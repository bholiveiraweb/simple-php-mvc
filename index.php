<?php
use Core\Application;

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require __DIR__ . '/vendor/autoload.php';

$app = new Application;
$app->run();