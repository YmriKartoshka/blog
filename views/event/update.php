<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\controllers\EventController;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;

$this->title                   = "Update event";
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


<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'description')->textArea([
    'rows' => 10,
    'cols' => 70,
]) ?>

<?= $form->field($model, 'bookId')->widget(Select2::class, [
    'data'          => EventController::getBooks(),
    'language'      => 'en',
    'options'       => ['placeholder' => 'Select book...'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]) ?>

<?= $form->field($model, 'date')->widget(
    DatePicker::class, [
    'type'          => DatePicker::TYPE_COMPONENT_APPEND,
    'options'       => ['placeholder' => 'Select date ...'],
    'pluginOptions' => [
        'autoclose'      => true,
        'format'         => 'yyyy-m-dd',
        'todayHighlight' => true
    ]
]) ?>


<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Submit', [
            'class' => 'btn btn-primary',
            'name'  => 'updateEvent-button',
        ]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
