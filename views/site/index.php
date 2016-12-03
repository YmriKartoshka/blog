<?php

/* @var $this yii\web\View */

$this->title = 'News';
?>
<?php use yii\helpers\Html; ?>
<p><?php if(!Yii::$app->user->isGuest) echo Html::a('Create New Post', array('post/create'), array('class' => 'btn btn-primary pull-right')); ?></p>
<div class="clearfix"></div>


