<?php

require_once './router.php';
require_once './api.php';
require_once './storage.php';
require_once './responce.php';

$storage = Storage::getInstance('database');
$router = Router::getInstance();
$api = API::getInstance($storage);
// Set exception class
class NoValidRequestException extends Exception {
    
}


try {
  $route = $router->route();
  $items = $api->use($route);
  $responce = new Responce(200, '', 'OK', $items);
  echo $responce();
} catch (NoValidRequestException $e) {
  $responce = new Responce($e->getCode(), $e->getMessage(), 'INVALID_REQUEST');
  echo $responce();
}