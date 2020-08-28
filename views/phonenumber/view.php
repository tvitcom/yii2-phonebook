<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Phonenumber */

$this->title = $model->phonenumber_id;
$this->params['breadcrumbs'][] = ['label' => 'Phonenumbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
    <div class="phonenumber-view col-xs-12 col-sm-6 col-md-8">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->phonenumber_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->phonenumber_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'phonenumber_id',
                // 'person_id',
                'number',
            ],
        ]) ?>

    </div>
    <div class="col-xs-6 col-md-4">
        
    </div>
</div>
