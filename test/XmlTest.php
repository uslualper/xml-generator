<?php

namespace Test;

use Exception;
use System\Test\ITest;

use Models\Cimri;
use Models\Epey;

class XmlTest implements ITest{

    public $modelName;

    public function __construct($modelName = false)
    {
        $this->modelName = $modelName;
    }

    public function handle()
    {
        $data = json_decode(file_get_contents('./data/products.json'));

        $model = false;

        if($this->modelName === "cimri"){
            $model = new Cimri("Cimri Test");
        }elseif($this->modelName === "epey"){
            $model = new Epey("Epey Test");
        }

        if($model){
            foreach($data as $x){
                try {
                    $model->addItem($x->id, $x->name, $x->price, $x->category);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
        }        

        return $model->getXml();
    }


}