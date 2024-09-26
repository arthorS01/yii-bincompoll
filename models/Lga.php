<?php
namespace app\Models;

use yii\db\ActiveRecord;


class Lga extends ActiveRecord{

    public static function tableName(){
        return "lga";
    }
    
    public function getPoll(){
        return $this->hasMany(Poll::class,["lga_id"=>"lga_id"]);
    }

    public function getLgaResults(){
        return $this->hasMany(Lgaresult::class,["lga_name"=>"lga_id"]);
    }

}