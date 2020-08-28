<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'People';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <div class="person-index col-xs-12 col-sm-6 col-md-8">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Person', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProviderPersons,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'person_id',
                'name',
                'surname',
                // 'note:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <?php Pjax::end(); ?>

    </div>
    <div class="col-xs-6 col-md-4">

    </div>
</div>
