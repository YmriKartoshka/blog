<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<h4>Send Comment</h4>
<?php $commentForm = ActiveForm::begin([
    'action'      => '../comment/create',
    'id'          => 'comment-form',
    'options'     => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>
<?= $commentForm->field($newcomment, 'message')->textArea([
    'rows' => 3,
    'cols' => 250,
]) ?>
<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::submitButton('Send', [
                'class' => 'btn btn-primary',
                'name'  => 'createBook-button',
                'value' => $id,
            ]) ?>
		</div>
	</div>
<?php ActiveForm::end(); ?>

