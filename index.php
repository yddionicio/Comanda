<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once 'vendor/autoload.php';
require 'UsuarioApi.php';
require 'ProductosApi.php';
require 'MesaApi.php';
require 'PedidoApi.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);
$app->get('/', function(){echo "holita";}); 
$app->group('/usuario', function () {
 
  $this->get('/', \UsuarioApi::class . ':Select');
  $this->post('/', \UsuarioApi::class . ':Insert');
});

$app->group('/producto', function () {
 
  $this->get('/', \ProductoApi::class . ':Select');
  $this->post('/', \ProductoApi::class . ':Insert');
     
});

$app->group('/mesa', function () {
 
  $this->get('/', \MesaApi::class . ':Select');
  $this->post('/', \MesaApi::class . ':Insert');
     
});

$app->group('/pedido', function () {
 
  $this->get('/', \PedidoApi::class . ':Select');
  $this->post('/', \PedidoApi::class . ':Insert');
     
});

$app->run();



