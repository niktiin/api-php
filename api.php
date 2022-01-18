<?php

  class API {
    protected static $_instance;
    protected static $_storage;
    private $route;

    private function __construct() {}
    private function __clone() {
    }
    private function __wakeup() {
    }

    /**
     * Single class
     * @param [object] $storage — object to use database 
     * @return [object] — self
     */
    static function getInstance($storage) {
      if (self::$_instance === null) {
          self::$_instance = new self;
          self::$_storage = $storage; 
      }
      return self::$_instance;
    }

    /**
     * Calling the appropriate methods and works with the storage class.
     * @throws NoValidRequestException — if route not allowed
     * @param  [array] $route — url, method and parameters
     */
    function use($route = null) {
      if (method_exists(self::$_instance,$route['method'])) {
        self::$_instance->route = $route;
        $methodName = $route['method'];
        return self::$_instance->$methodName();
      }
      throw new NoValidRequestException("Method '".$route['method']."' not allowed", 405); 
    }

    /**
     * Implementation of method get
     * @throws NoValidRequestException — if property 'id' unncorect
     * @return [string] — return items array or empty array
     */    
    function get() {
      // Get additional parameters
      $itemsId = self::$_instance->route['props'][0];
      if (count(self::$_instance->route['props']) > 0 && !is_numeric($itemsId)) {
        throw new NoValidRequestException("Unncorect property 'ID'", 405);
      }

      $items = self::$_storage->get($itemsId);
      return $items;
    }

    /**
     * Implementation of method post
     * @todo check items data
     * @return array — return processed array of item parameters
     */   
    function post() {
      $data = file_get_contents("php://input");
      $items = json_decode($data, true)[0];
      $result = self::$_storage->add($items);
      return $result;
    }

    /**
     * Implementation of method put
     * @todo check items data
     * @return array — return processed array of item parameters
     */ 
    function put() {
      // Get additional parameters
      $itemsId = self::$_instance->route['props'][0];
      if (count(self::$_instance->route['props']) > 0 && !is_numeric($itemsId)) {
        throw new NoValidRequestException("Unncorect property 'ID'", 405);
      }
      if (count(self::$_instance->route['props']) < 1) {
        throw new NoValidRequestException("property 'ID' undifined", 405);
      }

      $data = file_get_contents("php://input");
      $items = json_decode($data, true)[0];
      
      $result = self::$_storage->update($items, $itemsId);
      return $result;
    }
  }
