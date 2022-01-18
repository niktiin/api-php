<?php

require_once './router.php';
require_once './api.php';
require_once './storage.php';

$storage = Storage::getInstance('database');
$router = Router::getInstance();
$api = API::getInstance($storage);
// Set exception class
class NoValidRequestException extends Exception {
    
}


try {
  $route = $router->route();
  $responce = $api->use($route);
  echo json_encode($responce);
} catch (NoValidRequestException $e) {
  // Set error responce INVALID_REQUEST
  echo json_encode($e->getMessage());
}