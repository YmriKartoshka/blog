<?php

use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\controllers\EventController;
use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;

$this->title                   = "Advanced search event";
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1><hr />

<?php $form = ActiveForm::begin([
    'id'          => 'genre-create-form',
    'options'     => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

<?= $form->field($search, 'name')->textInput() ?>

<?= $form->field($search, 'description')->textInput() ?>

<?= $form->field($search, 'bookId')->widget(Select2::class, [
    'data'          => EventController::getBooks(),
    'language'      => 'en',
    'options'       => ['placeholder' => 'Select book...'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]) ?>

<?= $form->field($search, 'date')->widget(DatePicker::class, [
    'inline'        => true,
    'template'      => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
    'clientOptions' => [
        'autoclose' => true,
        'format'    => 'yyyy-m-dd',
        'clearBtn'  => true,
    ],
]); ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Find', [
            'class' => 'btn btn-primary',
            'name'  => 'find-button',
        ]); ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
<hr />

<h2><?= 'Results:' ?></h2>

<div class="row">
    <?php foreach ($events as $event): ?>
        <div class="col-lg-12">
            <h3><?php echo Html::a($event->name, [
                    'event/index',
                    'id' => $event->id,
                ]); ?></h3><hr />
        </div>
    <?php endforeach; ?>
</div>

