<?php

namespace Test;

use Exception;
use System\Test\ITest;
use System\Model\IModel;

use Models\Cimri;
use Models\Epey;

class ModelTest implements ITest{

    public function handle()
    {
        $results = [];

        $data = json_decode(file_get_contents('./data/products.json'));

        $cimri = new Cimri("Cimri Test");
        $results["cimri"] = $this->modelTest($cimri, $data);

        $epey = new Epey("Epey Test");
        $results["epey"] = $this->modelTest($epey, $data);

        return $results;
    }

    protected function modelTest(IModel $model, $data){
        $result = [
            "xml"     => "",
            "success" => false,
            "warning" => "",
            "error"   => []
        ];
        foreach($data as $x){
            try {
                $model->addItem($x->id, $x->name, $x->price, $x->category);
            } catch (Exception $e) {
                $result["error"][] = $e->getMessage();
            }
        }
        if(count($model->items)===0){
            $result["warning"] = "Items count 0";
        }
        $result["xml"] = $model->getXml();
        if(count($result["error"])===0 && $result["xml"]!==""){
            $result["success"] = true;
        }
        return $result;
    }

}