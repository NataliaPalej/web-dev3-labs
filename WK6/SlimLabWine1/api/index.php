<?php
require 'Slim/Slim.php';
require 'wine_db.php';
require 'database.php';
use Slim\Slim;
\Slim\Slim::registerAutoloader();

$app = new Slim();
$app->get('/wines', 'getWines');
$app->get('/wines/:id',  'getWine');
$app->get('/wines/search/:query', 'findByName');

// Update, delete, post methods route needs to be added 
$app->post('/wines', 'addWine');
$app->update('/wines', 'updateWine');
$app->delete('/wines', 'deleteWine');

$app->run();
?>



