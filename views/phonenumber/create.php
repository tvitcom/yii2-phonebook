<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Phonenumber */

$this->title = 'Create Phonenumber';
$this->params['breadcrumbs'][] = ['label' => 'Phonenumbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonenumber-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
