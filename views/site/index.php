<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have phonebook application.</p>

        <p><a class="btn btn-lg btn-success" href="<?=Url::toRoute(['person/index'])?>">Use phonebook now</a></p>
    </div>

    <div class="body-content">

        <div class="row">
        
        </div>

    </div>
</div>
