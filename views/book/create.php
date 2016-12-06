<?php
/**
 * Created by PhpStorm.
 * User: minaevaolga
 * Date: 12/3/16
 * Time: 10:22 PM
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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
<?= $form->field($model, 'description')->textInput() ?>
<?//= $form->field($model, 'author')->textInput() ?>
<?//= $form->field($model, 'genre')->textInput() ?>
<?//= $form->field($model, 'year')->textInput() ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'createBook-button']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
