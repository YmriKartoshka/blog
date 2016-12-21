<?php

use yii\bootstrap\ActiveForm;

$this->title = 'Knigopoisk - events';
?>
<?php use yii\helpers\Html; ?>

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

    <div class="form-group">
        <div class="col-lg-offset-10">
            <?= Html::a('Books', [
                'index',
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


    <div class="row">
    <?php foreach ($events as $event): ?>
        <div class="col-lg-12">
            <hr /><h3><?php echo Html::a($event->name, [
                    'event/index',
                    'id' => $event->id,
                ]); ?></h3><hr />
        </div>
    <?php endforeach; ?>
</div>
<?php ActiveForm::end(); ?>