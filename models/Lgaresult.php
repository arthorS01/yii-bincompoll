<?php
namespace app\Models;

use yii\db\ActiveRecord;


class Lgaresult extends ActiveRecord{

    public static function tableName(){
        return "announced_lga_results";
    }

    public function getLga(){
        return $this->hasOne(Lga::class,["lga_id"=>"lga_name"]);
    }

}