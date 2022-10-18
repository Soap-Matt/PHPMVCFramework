<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;

// php -S localhost:8080

$app = new Application();

$app->router->get('/', function (){
    return
        'Hello World';
});
$app->router->get('/contact', function (){
    return
        'Contact';
});


$app->run();
