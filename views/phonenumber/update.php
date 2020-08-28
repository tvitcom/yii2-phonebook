<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Phonenumber */

$this->title = 'Update Phonenumber: ' . $model->phonenumber_id;
$this->params['breadcrumbs'][] = ['label' => 'Phonenumbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->phonenumber_id, 'url' => ['view', 'id' => $model->phonenumber_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phonenumber-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
