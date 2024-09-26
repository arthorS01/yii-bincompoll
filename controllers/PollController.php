<?php

namespace app\controllers;

use yii\web\Controller;
use app\Models\{Poll,Result} ;
use Yii;

class PollController extends Controller{

 
    public function actionIndex()
    {
      
        $polling_units = Poll::find("polling_units")->all();
     
        $units = [];

        foreach($polling_units as $polling_unit){

            $units[$polling_unit["uniqueid"]] = $polling_unit["polling_unit_name"];
        }
        return $this->render("/poll/index",["units"=>$units]);
    }

    public function actionResult()
    {
        if(Yii::$app->request->getMethod() == "POST"){
            $data = Yii::$app->request->post()["Poll"];


            $polling_units = Poll::find("polling_units")->all();
            $result = Result::getResult(["polling_unit_uniqueid"=>$data["polling_unit_id"]]);

            $units = [];
    
            foreach($polling_units as $polling_unit){
    
                $units[$polling_unit["uniqueid"]] = $polling_unit["polling_unit_name"];
            }

            
            return $this->render("/poll/index",["units"=>$units,"results"=>$result]);
        }
       
    }

    public function getTotalPage()
    {
        $path = "getTotal";
        $allLGA = (new PollModelHandler())->getLGAs();
        $view =  View::render($path,["polling_units"=>$units,"results"=>$results]);
 
        if(is_bool($view)){
          
            return false;
        }else{

            return $view;
        }    
       
    }
}