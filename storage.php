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

    /**
     * Implementation of method add
     * @param array $items — Request items properties
     * @return array — Return processed array of item parameters
     * @todo Validation items
     */
    function add($items) {
      // Read database file
      $handle = fopen ('storage/'.self::$_database.'.txt',"r+") or $error = true;
      $data = file_get_contents('storage/'.self::$_database.'.txt');

      // If the storage is empty an array is created
      $unserializeData = $data ? unserialize($data) : [];
      $length = count($unserializeData);
      $items['id'] = $length++;
      array_push($unserializeData, $items);

      // Serialize and write data
      $serializeData = serialize($unserializeData);
      fwrite($handle, $serializeData);
      fclose ($handle);
      return $items;
    }

    /**
     * Implementation of method add
     * @param array $items — Request items properties
     * @param number $itemsId — item parameter, id
     * @return array — Return processed array of item parameters
     * @todo Validation items
     */
    function update($items, $itemsId) {
      // Read database file
      $handle = fopen ('storage/'.self::$_database.'.txt',"r+") or $error = true;
      $data = file_get_contents('storage/'.self::$_database.'.txt');

      // If the storage is empty an array is created
      $unserializeData = $data ? unserialize($data) : [];
      foreach ($unserializeData as $key => $value) {
        if ($value['id'] == $itemsId) {
          // Updating information other than id
          $unserializeData[$key] = $items;
          $unserializeData[$key]['id'] = $itemsId;
          $items = $unserializeData[$key];
          break;
        }
      }
      // Serialize and write data
      $serializeData = serialize($unserializeData);
      fwrite($handle, $serializeData);
      fclose ($handle);
      return $items;
    }

    /**
     * Implementation of method delete
     * @param number $itemsId — item parameter, id
     * @throws NoValidRequestException — items with id no exists
     * @return array — Return processed array of item parameters 
     */
    function delete($itemsId) {
      // Read database file
      $handle = fopen ('storage/'.self::$_database.'.txt',"r+") or $error = true;
      $data = file_get_contents('storage/'.self::$_database.'.txt');

      // If the storage is empty an array is created
      $unserializeData = $data ? unserialize($data) : [];
      foreach ($unserializeData as $key => $value) {
        if ($value['id'] == $itemsId) {
          $items = $unserializeData[$key];
          unset($unserializeData[$key]);
          break;
        }
      }
      if (!isset($items)) {
        throw new NoValidRequestException("items with id '$itemsId' no exists", 500);
      }
      // Serialize and write data
      $serializeData = serialize($unserializeData);
      fwrite($handle, $serializeData);
      fclose ($handle);
      return $items;
    }
  }

