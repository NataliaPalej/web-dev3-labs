<?php
require 'Slim/Slim.php';
require 'card_db.php';
require 'database.php';
use Slim\Slim;
\Slim\Slim::registerAutoloader();

$app = new Slim();
$app->get('/runners', 'getRunners');
$app->get('/runners/:id',  'getRunner');
$app->get('/runners/search/:query', 'findByName');

$app->run();
?>



