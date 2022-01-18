<?php

require_once './router.php';
require_once './api.php';
$router = Router::getInstance();
$api = API::getInstance('database');
// Set exception class
class NoValidRequestException extends Exception {
    
}


try {
  $route = $router->route();
  $api->use($route);
  echo json_encode($api);
} catch (NoValidRequestException $e) {
  // Set error responce INVALID_REQUEST
  echo json_encode($e->getMessage());
}