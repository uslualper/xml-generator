<?php

namespace System\Model;

use DateTime;

/**
 * BaseModel
 */
abstract class BaseModel {
  public $name;
  public $description;
  public $date;
  public $version;
  public $items;
    
  /**
   * __construct
   *
   * @param  string $name
   * @param  string $description
   * @param  DateTime $date
   * @param  string $version
   * @param  array $items
   * @return void
   */
  public function __construct(string $name,string $description,DateTime $date = new DateTime(), string $version,array $items = []) {
    $this->name = $name;
    $this->description = $description;
    $this->date = $date;
    $this->version = $version;
    $this->items = $items;
  }

   
  /**
   * deleteItem
   *
   * @param  int $id
   * @return bool
   */
  public function deleteItem(int $id) : bool{
      $findIndex = array_search($id,array_column($this->items,'id'));
      if($findIndex!==false){
          unset($this->items[$findIndex]);
          return true;
      }else{
          return false;
      }
  }
}
