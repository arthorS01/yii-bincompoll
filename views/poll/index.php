<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\Models\Poll;

?>
    <div>
    <h2>Display the results of any individual polling unit</h2>
    <section id="control-area" >

    <?php 

    $model = new Poll;

    $form = ActiveForm::begin([
        "action"=>"/poll/result",
        "method"=>"POST"
    ]);

    
    echo $form->field($model, 'polling_unit_id')->dropdownList($units);

   echo Html::submitButton('Get result', ['class' => 'btn btn-primary', 'name' => 'login-button']);

   ActiveForm::end();
?>

    </section>
   
    <section id="result-area">
        
            <?php if(isset($results) && count($results) == 0):?>
               <p>Sorry, no result for this polling unit </p>
            <?php endif; ?>

            <?php if( isset($results) && count($results) > 0):?>
                <table>
                <thead>
                    <tr>
                        <th>Party</th>
                        <th>Entered by </th>
                        <th>Score</th>
                        <th>Date</th>
                    </tr>
                </thead>
            <tbody>
                <?php foreach($results as $result):?>
                    <tr>
                        <td><?=$result["party_abbreviation"]?></td>
                        <td><?=$result["entered_by_user"]?></td>
                        <td><?=$result["party_score"]?></td>
                        <td><?=$result["date_entered"]?></td>
                    <tr> 
                    <?php endforeach;?>
            </tbody>
        </table>
            <?php endif; ?>

    <section>
    </div>
    
