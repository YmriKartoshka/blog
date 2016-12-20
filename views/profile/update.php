<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\controllers\BookController;
use etsoft\widgets\YearSelectbox;
use kartik\select2\Select2;

//use app\forms\AuthorForm;

$this->title                   = "Update profile";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-lg-6">
         <span class="pull-right">
            <?php if (Yii::$app->user->id === $profile->id) {
                echo Html::a('Change password', [
                    'profile/change',
                    'id' => $profile->id,
                ], ['class' => 'btn btn-primary']);
            } ?>
         </span>
    </div>
</div>
<hr/>

<?php $form = ActiveForm::begin([
    'options'     => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template'     => "{label}\n<div class=\"col-lg-3\">{input}</div><div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]);

echo $form->field($profile, 'firstName')->textInput(['autofocus' => true]);

echo $form->field($profile, 'lastName')->textInput();

echo $form->field($profile, 'secondName')->textInput();

echo $form->field($profile, 'email')->textInput();

echo $form->field($profile, 'phone')->textInput();
?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Submit', [
            'class' => 'btn btn-primary',
            'name'  => 'update-profile-button',
        ]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
