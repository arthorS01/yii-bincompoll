
<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\Models\Lga;

?>


    <div>

    <h2>Display the sum total from a particular L.G.A</h2>
    <section id="control-area">

    <?php 

$model = new Lga;

$form = ActiveForm::begin([
    "action"=>"/lga/total",
    "method"=>"POST"
]);


echo $form->field($model, 'lga_name')->dropdownList($allLga);

echo Html::submitButton('Get total', ['class' => 'btn btn-primary', 'name' => 'login-button']);

ActiveForm::end();
?>

    </section>
   
    <section id="result-area">
        <p>Total:<strong><?=$total?></strong></p>
    <section>
    
    </div>
 