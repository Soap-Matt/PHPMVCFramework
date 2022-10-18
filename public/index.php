<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;

// php -S localhost:8080

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');


$app->run();
