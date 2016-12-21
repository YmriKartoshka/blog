<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Knigopoisk - events';
?>
    <div class="row">
        <div class="col-lg-6">
            <?= Html::a('Show books', [
                'index',
            ], ['class' => 'btn btn-primary']); ?>
        </div>
    </div>

<?php $form = ActiveForm::begin([
    'id'          => 'events-search-form',
    'options'     => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template'     => "{label}\n<div class=\"col-md-offset-10\">{input}</div>\n<div class=\"col-lg-10\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-10 control-label'],
    ],
]); ?>

<?= $form->field($search, 'name')->textInput(['autofocus' => true]) ?>

    <div class="form-group">
        <div class="col-lg-offset-10">
            <?= Html::submitButton('Find', [
                'class' => 'btn btn-primary',
                'name'  => 'find-button',
            ]); ?>
            <?= Html::a('Advanced Search', [
                'event/search',
            ], ['class' => 'btn btn-primary']); ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>

<?php $form = ActiveForm::begin([
    'id'          => 'books-show-form',
    'options'     => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-2 control-label'],
    ],
]); ?>

    <style>
        h2 {  text-decoration: underline; }
    </style>

    <h2><?php echo 'List of Events' ?></h2>

    <div class="row">
    <?php foreach ($events as $event): ?>
        <div class="col-lg-12">
            <h3><?php echo Html::a($event->name, [
                    'event/index',
                    'id' => $event->id,
                ]); ?></h3><hr/>
        </div>
    <?php endforeach; ?>
</div>
<?php ActiveForm::end(); ?>