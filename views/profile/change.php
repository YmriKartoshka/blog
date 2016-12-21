<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title                   = "Change password";
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1><hr/>

<?php $form = ActiveForm::begin([
    'options'     => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>


<?= $form->field($passForm, 'password')->passwordInput(['autofocus' => true]) ?>

<?= $form->field($passForm, 'newPassword')->passwordInput() ?>

<?= $form->field($passForm, 'passwordConfirm')->passwordInput() ?>


<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Submit', [
            'class' => 'btn btn-primary',
            'name'  => 'update-profile-button',
        ]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
