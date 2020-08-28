<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
    <div class="phonenumber-view col-xs-12 col-sm-6 col-md-8">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->person_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->person_id], [
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
            'person_id',
            'name',
            'surname',
            'note:ntext',
        ],
    ]) ?>

    </div>
    
   <div class="col-xs-6 col-md-4">
        
        <h2>Phones</h2>

        <ul class="list-group">
          
            <?= ListView::widget([
                'dataProvider' => $dataProviderPhonenumbers,
                'itemView' => '_list_phones',
            ]);?>

        </ul>

        <?= Html::a('Add number', ['phonenumber/create', 'person_id' => $model->person_id], ['class' => 'btn btn-default']) ?>

    </div>

    </div>
    
</div>
