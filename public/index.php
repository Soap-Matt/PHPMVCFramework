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

// TODO 1:53:00 https://www.youtube.com/watch?v=6ERdu4k62wI&t=3626s&ab_channel=freeCodeCamp.org


// each model needs its own validation rules & the Model->validate function should go through these rules & test the validate attrivutes against the rules
// add a abstract rules function to the Model class
// create a few RULE constants inside the model (required, email, min, max, match)
// Create the rules array inside the registerModel
// Setup the validation method using the rules constants created
// Loop through the rules where you have each attribute & their corresponding rules
// Loop through the rules also
// Get the value of the attribute inside the validation loop
// Get the appropriate rule name. if the rule is a array, set the first element to the ruleName others it is the rule
// Start implementing the rules
// Create a errors array to the model, if a validation does not adhere to a rule, add the error with the attribute & the attribute type
// create add error function that uses a sub array to assign the error message to the attribute (attributes can have more than one error)
// create a error messages function that has a error message for each violation eg ("This field is required")
// return true if no errors
// Test only for the required validation
// Log out the errors

