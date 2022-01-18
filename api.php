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
     * @param  [array] $route — url, method and parameters
     * @return [object] — self method
     * throws  NoValidRequestException — if route not allowed or unncorect id
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
     * Undocumented function
     *
     * @return void
     */    
    function get() {
      // Get additional parameters
      $itemsId = self::$_instance->route['props'][0];
      if (count(self::$_instance->route['props']) > 0 && !is_numeric($itemsId)) {
        throw new NoValidRequestException("Unncorect property 'ID'", 405);
      }

      //$items = self::$_storage->get($itemsId);
      return array(); //$items;
    }
  }
