<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = $pagename;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-createpost">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'createpost-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'content')->textArea(['rows' => 10, 'cols' => 70]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'createpost-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
