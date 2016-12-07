<?php
/**
 * Created by PhpStorm.
 * User: minaevaolga
 * Date: 12/3/16
 * Time: 10:22 PM
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use etsoft\widgets\YearSelectbox;

$this->title = "Create book";
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin([
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>


<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'description')->textArea(['rows' => 10, 'cols' => 70]) ?>
<?//= $form->field($model, 'author')->dropDownList([
//    'pushkin_as' => 'Пушкин А.С.',
//    'lermontov_mu' => 'Лермонтов М.Ю.',
//    'pupkin_v' => 'Пупкин Вася',
//]) ?>
<?//= $form->field($model, 'genre')->dropDownList([
//    'fantastic' => 'Фантастика',
//    'detective' => 'Детектив',
//    'novel' => 'Роман',
//]) ?>
<?//= $form->field($model, 'year')->widget(YearSelectbox::classname(), [
//    'yearStart' => 2016,
//    'yearStartType' => 'fix',
//    'yearEnd' => 1800,
//    'yearEndType' => 'fix',
//]); ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'createBook-button']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
