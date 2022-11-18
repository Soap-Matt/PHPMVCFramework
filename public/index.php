<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\SiteController;
use app\core\Application;

// start server - cd public php -S localhost:8080

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);


$app->run();

// TODO: Sanitize POST data
// TODO: Create a getBody method in the request class
// TODO: Sanitize the $_POST data inside this function
// TODO: Return the sanitzed data
// TODO: Check the request method & sanitize the $_GET & $_POST data respectively
// TODO: use the filter_input function, use FILTER_SANITIZE_SPECIAL_CHARS function
// TODO: get the request data in the handleContact Function of the SiteController
// TODO: Accept a Request instance in the handleContact method
// TODO: Then fetch the body directly from the request
// TODO: Pass the request to the controller action we are calling


