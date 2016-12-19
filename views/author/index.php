<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

$this->title                   = 'Create author';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to create author:</p>

    <?php $form = ActiveForm::begin([
        'id'          => 'author-create-form',
        'options'     => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'firstName')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput() ?>

    <?= $form->field($model, 'secondName')->textInput() ?>

    <?= $form->field($model, 'birthDay')->widget(
        DatePicker::className(), [
        'inline'        => true,
        'template'      => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format'    => 'yyyy-m-dd',
            'todayBtn'  => false
        ]
    ]);?>

    <?= $form->field($model, 'deathDay')->widget(
        DatePicker::className(), [
        'inline'        => true,
        'template'      => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format'    => 'yyyy-m-dd',
            'todayBtn'  => false
        ]
    ]);?>

    <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Create', [
                    'class' => 'btn btn-primary',
                    'name'  => 'create-button',
                ]) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
