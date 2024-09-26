<?php
namespace app\Models;

use yii\db\ActiveRecord;


class Poll extends ActiveRecord{

    public static function tableName(){
        return "polling_unit";
    }
    
    public static function getResult(array $filter){
        
       return self::findAll($filter);
        
    }

    public function getLga(){
        return $this->hasOne(Lga::class,["lga_id"=>"lga_id"]);
    }

    public function getResults(){

        return $this->hasMany(Result::class,["uniqueid"=>"polling_unit_unique_id"]);

    }
    
    public function getPollingUnitResult(){

        return $this->hasOne(Pollingunitresult::class,["polling_unit_uniqueid"=>"polling_unit_id"]);
    }
    public function getUnits():array
    {
        $stmt  = $this->connection->prepare(
            "SELECT uniqueid,polling_unit_name FROM polling_unit"
        );

        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}