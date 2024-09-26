<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\Models\{Lga,Poll,Lgaresult};


class LgaController extends controller{
     
    public function actionTotal()
    {
        
        $allLga = Lga::find()->all();
        $results = null;
        $total = null;
        $filteredLga = null;
        $sum =null;
        $polling_units = null;

        $lga_data = [];

        foreach($allLga as $lga){

            $lga_data[$lga["lga_id"]] = $lga["lga_name"];
        }

        if(Yii::$app->request->getMethod()=="POST"){

            $data = Yii::$app->request->post()["Lga"];
            
            $filteredLga = Lga::findOne(["lga_id"=>$data["lga_name"]]);
            $polling_units = Poll::findAll(["lga_id"=>$data["lga_name"]]);
            $sum = 0;

    
            foreach($polling_units as $unit){
        

                $results = $unit->pollingUnitResult;

                if($results == null){
                    continue;
                }

               $sum +=$results->party_score;

            }

           
        }else{
            
        }
       
      
        return $this->render("/poll/lga_results",["allLga"=>$lga_data,"units"=> $polling_units,"total"=>$sum,"method"=>strtolower($_SERVER["REQUEST_METHOD"]), "sum"=>$sum]);
        
    }
}