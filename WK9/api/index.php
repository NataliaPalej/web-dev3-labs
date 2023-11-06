<?php
require 'Slim/Slim.php';
require 'wine_db.php';
require 'database.php';
use Slim\Slim;
\Slim\Slim::registerAutoloader();

$app = new Slim();

// Enable CORS for all origins
$app->options('/(:x+)', function () use ($app) {
$app->response()->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
$app->response()->header('Access-Control-Allow-Headers', 'Content-Type');
});

$app->get('/wines', 'getWines');
$app->get('/wines/:id',  'getWine');
$app->get('/wines/search/:query', 'findByName');
$app->post('/wines', 'addWine');
$app->delete('/wines/:id',	'deleteWine');
$app->put('/wines/:id', 'updateWine');
$app->run();
?>



