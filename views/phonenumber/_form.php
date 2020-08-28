<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Phonenumber */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phonenumber-form">

    <?php $form = ActiveForm::begin(); ?>
 	
 	<?= $form->field($model, 'person_id')->hiddenInput(['value' => $model->person_id])->label(false) ?>
    
    <?= $form->field($model, 'number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
