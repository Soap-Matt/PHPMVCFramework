<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

// start server - cd public php -S localhost:8080

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);


$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->run();

// TODO 2:00:00 https://www.youtube.com/watch?v=6ERdu4k62wI&t=3626s&ab_channel=freeCodeCamp.org

// TODO: The form->field function should create the form groups
// TODO: Add a to string magic method to the field class
// TODO: Create a has error method on the Model
// TODO: Model needs get first error class
// TODO: Add a type property to the Field class
// TODO: Create constants for the form types inside the Field class
// TODO: Set the fields type to text as default in the constructor

