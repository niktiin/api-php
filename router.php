<?php

class Router {
  protected static $_instance;
  private $url, $route, $method, $props = [];

  private function __construct() {}
  private function __clone() {
  }
  private function __wakeup() {
  }
  // Init and link storage
  static function getInstance() {
    if (self::$_instance === null) {
        self::$_instance = new self; 
    }
    return self::$_instance;
  }

  /**
   * Routing class
   * Checks the correspondence of the route and parses the request parameters
   * @var route — R
   * @return array — returns the url, method and parameters
   */
  function route () {
    self::$_instance->url = array_slice(explode('/', $_SERVER['REQUEST_URI']), 1);
    self::$_instance->method = strtolower($_SERVER['REQUEST_METHOD']);
    $route = self::$_instance->url[2];
    if (count(self::$_instance->url) > 3) {
      self::$_instance->props = array_slice(self::$_instance->url, 3);
    }

    if (!$route) {
      throw new NoValidRequestException("Route empty", 405); 
    }
    if ($route != 'items') {
      throw new NoValidRequestException("Route '".strtoupper($route)."' not allowed", 405); 
    }
    return array(
      'method' => self::$_instance->method,
      'url' => self::$_instance->url,
      'props' => self::$_instance->props
    );
  }
}