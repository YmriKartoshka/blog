<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title                   = 'Create genre';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genre-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to create genre:</p>

    <?php $form = ActiveForm::begin([
        'id'          => 'genre-create-form',
        'options'     => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

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
