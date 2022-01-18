<?php
  interface iStorage {
    function get($itemId);
  };

  class Storage{
    protected static $_instance;
    protected static $_database;

    private function __construct() {}
    private function __clone() {
    }
    private function __wakeup() {
    }

    /**
     * Single class
     * @param [string] $database — database file name
     * @return [object] — self
     */
    static function getInstance($database) {
      if (self::$_instance === null) {
          self::$_instance = new self; 
          self::$_database = $database; 
      }
      return self::$_instance;
    }

    /**
     * Implementation of method get
     * @param [number] $itemsId — parameter to find items
     * @return [array] — return items or empty array
     */
    function get($itemsId = null) {
      $handle = @file_get_contents('storage/'.self::$_database.'.txt');
      // If data does not exist
      if ($handle) {
        $data = unserialize($handle);
      } else {
        return [];
      }
      // If items id is specified then search for the item
      if (isset($itemsId)) {
        foreach ($data as $key => $value) {
          if ($value['id'] == $itemsId) {
            $items = $value;
            break;
          }
        }
        // If items is found
        if ($items) {
          return $items;
        } else {
          return [];
        }
      }else {
        // if items id is not specified
        return $data;
      }
    }
  }

