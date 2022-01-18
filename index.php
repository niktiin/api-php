<?php

require_once './router.php';
$router = Router::getInstance();

// Set exception class
class NoValidRequestException extends Exception {
    
}


try {
  $route = $router->route();
  echo json_encode($route);
} catch (NoValidRequestException $e) {
  // Set error responce INVALID_REQUEST
  echo json_encode($e->getMessage());
}