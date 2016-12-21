<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;

$this->title                   = 'Create author';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-create">
    <h1><?= Html::encode($this->title) ?></h1><hr/>

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
        DatePicker::class, [
        'type'          => DatePicker::TYPE_COMPONENT_APPEND,
        'options'       => ['placeholder' => 'Select date ...'],
        'pluginOptions' => [
            'autoclose'      => true,
            'format'         => 'yyyy-m-dd'
        ]
    ]) ?>

    <?= $form->field($model, 'deathDay')->widget(
        DatePicker::class, [
        'type'          => DatePicker::TYPE_COMPONENT_APPEND,
        'options'       => ['placeholder' => 'Select date ...'],
        'pluginOptions' => [
            'autoclose'      => true,
            'format'         => 'yyyy-m-dd'
        ]
    ]) ?>

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
