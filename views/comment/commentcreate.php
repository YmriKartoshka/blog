<?php 
	use yii\helpers\Html; 
	use yii\bootstrap\ActiveForm;
?>

<h4>Send Comment</h4>
<?php $form = ActiveForm::begin([
	'id' => 'comment-form',
	//'action' => ['index.php?r=comment/create'],
	//'method' => 'post',
	'options' => ['class' => 'form-horizontal'],
	'fieldConfig' => [
		'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
		'labelOptions' => ['class' => 'col-lg-1 control-label'],
	],]); ?>
	<?= $form->field($newcomment, 'content')->textArea(['rows' => 3, 'cols' => 250]) ?>
	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::a('Send', ['comment/create', 'id' => $id], ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
		</div>
	</div>
<?php ActiveForm::end(); ?>

