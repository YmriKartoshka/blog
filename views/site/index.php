<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="row">
    <div class="col-lg-6">
        <?= Html::a('Show events', [
            'events',
        ], ['class' => 'btn btn-primary']); ?>
    </div>
</div>

<?php $form = ActiveForm::begin([
    'id'          => 'books-search-form',
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
            'book/search',
        ], ['class' => 'btn btn-primary']); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<style>
    h2 {  text-decoration: underline; }
</style>

<h2><?php echo 'List of Books' ?></h2>

<div class="row">
    <?php foreach ($books as $book): ?>
        <div class="col-lg-12">
            <h3><?php echo Html::a($book->name, [
                    'book/index',
                    'id' => $book->id,
                ]); ?></h3><hr/>
        </div>
    <?php endforeach; ?>
</div>