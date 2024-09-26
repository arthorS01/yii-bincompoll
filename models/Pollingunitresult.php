<?php
namespace app\Models;

use yii\db\ActiveRecord;


class Pollingunitresult extends ActiveRecord{

    public static function tableName(){
        return "announced_pu_results";
    }

    public function getPollingUnit(){
        return $this->hasOne(Poll::class,["polling_unit_id"=>"polling_unit_uniqueid"]);
    }

}