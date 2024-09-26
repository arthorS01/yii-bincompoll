<?php
namespace app\Models;

use yii\db\ActiveRecord;


class Result extends ActiveRecord{

    public static function tableName(){
        return "announced_pu_results";
    }
    
    public static function getResult(array $filter){
        
       return self::findAll($filter);
        
    }

    public function getPoll(){
        return $this->hasOne(Poll::class,["polling_unit_unique_id"=>"uniqueid"]);
    }

}