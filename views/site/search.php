<?php

use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use etsoft\widgets\YearSelectbox;
use app\controllers\BookController;

$this->title = 'Knigopoisk';
?>
<?php use yii\helpers\Html; ?>

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

<?= $form->field($search, 'authorId')->widget(Select2::class, [
    'data'          => BookController::getAuthors(),
    'language'      => 'ru',
    'options'       => ['placeholder' => 'Select author...'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]) ?>

<?= $form->field($search, 'genreId')->widget(Select2::class, [
    'data'          => BookController::getGenres(),
    'language'      => 'ru',
    'options'       => ['placeholder' => 'Select genre...'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]) ?>

<?= $form->field($search, 'year')->widget(Select2::class, [
    'data'          => range(2016, 1800),
    'language'      => 'ru',
    'options'       => ['placeholder' => 'Select year...'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]) ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Find', [
            'class' => 'btn btn-primary',
            'name'  => 'find-button',
        ]); ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<div class="row">
    <?php foreach ($books as $book): ?>
        <div class="col-lg-12">
            <hr /><h2><?php echo Html::a($book->name, array('book/index', 'id'=>$book->id)); ?></h2><hr />
        </div>
    <?php endforeach; ?>
</div>

