<?php

use yii\helpers\Html;
use yii\helpers\Url;


?>

<li class="list-group-item">
    <?= Html::encode($model->number) ?>

	<div class="btn-group btn-group-xs" role="group" aria-label="phones">

	    <?= Html::a('update', ['phonenumber/update' ,'id' => $model->phonenumber_id ], ['class' => 'btn btn-default']) ?>

	    <?= Html::beginForm(['phonenumber/delete','id' => $model->phonenumber_id ], 'post')
                . Html::submitButton(
                    'delete',
                    ['class' => 'btn btn-default']
                )
                . Html::endForm()
	    ?>

	</div>

</li>