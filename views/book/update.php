<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use etsoft\widgets\YearSelectbox;
use kartik\select2\Select2;

//use app\forms\AuthorForm;

$this->title                   = "Update book";
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
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

<?= $form->field($model, 'authorId')->widget(Select2::class, [
    'data'          => $this->context->getAuthors(),
    'language'      => 'ru',
    'options'       => ['placeholder' => 'Select author...'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]) ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::a('Add', [
            'author/create'
        ], ['class' => 'btn btn-primary']); ?>
    </div>
</div>

<?= $form->field($model, 'genreId')->widget(Select2::class, [
    'data'          => $this->context->getGenres(),
    'language'      => 'ru',
    'options'       => ['placeholder' => 'Select genre...'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]) ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::a('Add', [
            'genre/create'
        ], ['class' => 'btn btn-primary']); ?>
    </div>
</div>


<?= $form->field($model, 'year')->widget(YearSelectbox::class, [
    'yearStart'     => 2016,
    'yearStartType' => 'fix',
    'yearEnd'       => 1800,
    'yearEndType'   => 'fix',
]); ?>


<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Submit', [
            'class' => 'btn btn-primary',
            'name'  => 'updateBook-button',
        ]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>