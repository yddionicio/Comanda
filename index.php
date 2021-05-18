<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'vendor/autoload.php';
require 'UsuarioApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);
$app->get('/', function(){echo "holita";}); 
$app->group('/usuario', function () {
 
  $this->get('/', \UsuarioApi::class . ':SelectUser');
  $this->post('/', \UsuarioApi::class . ':SelectUser');

     
});

$app->run();



