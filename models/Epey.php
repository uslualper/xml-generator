<?php

namespace Models;

use System\Model\BaseModel;
use System\Xml\XMLSerializer;
use System\Model\IModel;
/**
 * Epey
 */
class Epey extends BaseModel implements IModel{

    public $name;
    public $description;
    public $date;
    public $version = "0.0.1";
    public $items = [];

    public $usdRate = 18;
    
    /**
     * __construct
     *
     * @param  string $name
     * @param  string $description
     * @return void
     */
    public function __construct(string $name,string $description = "")
    {
        $this->date = new \DateTime();
        parent::__construct($name,$description,$this->date,$this->version);
    }
    
    /**
     * getXml
     *
     * @return string
     */
    public function getXml() : string {        
        return XMLSerializer::generateValidXmlFromArray([
            'name' => $this->name,
            'date' => $this->date->format('Y-m-d'),
            'version' => $this->version,
            'items' => $this->items,
        ]);
    }
    
    /**
     * addItem
     *
     * @param  int $id
     * @param  string $name
     * @param  float $price
     * @param  string $category
     * @return void
     */
    public function addItem(int $id = 0, string $name = '', float $price = 0, string $category = '') : bool{
        $findIndex = array_search($id,array_column($this->items,'id'));
        if($findIndex!==false){
            return false;
        }else{
            $this->items[] = [
                'id'=>$id,
                'name'=>$name,
                'price'=> "$".($price/$this->usdRate),
                'category'=>$category
            ];
            return true;
        }
        
    }
   

}