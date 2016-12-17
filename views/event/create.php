<?php
/**
 * Created by PhpStorm.
 * User: minaevaolga
 * Date: 12/3/16
 * Time: 10:24 PM
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

$this->title = "Create event";
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

<?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'content')->textArea(['rows' => 10, 'cols' => 70]) ?>
<?= $form->field($model, 'date')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-M-dd']) ?>

<br>
<br>
<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'createEvent-button']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
