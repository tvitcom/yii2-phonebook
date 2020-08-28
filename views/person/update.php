<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = 'Update Person: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->person_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">

	<div class="person-update col-xs-12 col-sm-5 col-md-8">

	    <h1><?= Html::encode($this->title) ?></h1>

	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>

	<div class="col-xs-6 col-md-4">
		
		<h2>Phones</h2>

		<ul class="list-group">
		  
			<?= ListView::widget([
			    'dataProvider' => $dataPhonesProvider,
			    'itemView' => '_list_phones',
			]);?>

		</ul>

	       <?= Html::a('Add number', ['phonenumber/create' ,'person_id' => $model->person_id ], ['class' => 'btn btn-default']) ?>

	</div>

</div>