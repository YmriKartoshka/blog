<?php
/**
 * Created by PhpStorm.
 * User: minaevaolga
 * Date: 12/3/16
 * Time: 1:23 AM
 */

$this->title                   = 'Profile';
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Html;

?>
<div class="row">
    <div class="col-lg-6">
        <h1><?php echo 'Profile' ?></h1>
    </div>

    <div class="col-lg-6">
         <span class="pull-right">
             <?php if (Yii::$app->user->id === $profile->id) {
                 echo Html::a('Update', [
                     'profile/update',
                     'id' => $profile->id,
                 ], ['class' => 'btn btn-primary']);
             } ?>
         </span>
    </div>
</div>
<hr />

<div class="row">
    <div class="col-lg-6">
        <p><?php echo 'First Name: ' . $profile->firstName; ?></p>
        <p><?php echo 'Last Name: ' . $profile->lastName; ?></p>
        <p><?php echo 'Second Name: ' . $profile->secondName; ?></p>
        <p><?php echo 'Email: ' . $profile->email; ?></p>
        <p><?php echo 'Phone: ' . $profile->phone; ?></p>
    </div>

    <div class="col-lg-6">
        <span class="pull-right">
             <?php if (Yii::$app->user->id === $profile->id) {
                 echo 'Actions:';
             } ?><br />
             <?php if (Yii::$app->user->id === $profile->id) {
                 echo Html::a('create book', ['book/create']);
             } ?><br />
             <?php if (Yii::$app->user->id === $profile->id) {
                 echo Html::a('create event', ['event/create']);
             } ?><br />
             <?php if (Yii::$app->user->id === $profile->id) {
                 echo Html::a('create author', ['author/create']);
             } ?><br />
             <?php if (Yii::$app->user->id === $profile->id) {
                 echo Html::a('create genre', ['genre/create']);
             } ?>
        </span>
    </div>
    <div class="col-lg-12">
        <span class="text-left">
            <hr /><h3><?php echo 'Created by ' . Yii::$app->user->identity->login . ':' ?></h3>
            <div class="col-lg-offset-10">
                <?= Html::a('Books', [
                    'index',
                    'id' => $profile->id,
                ], ['class' => 'btn btn-primary']); ?>
            </div>
            <?php foreach ($events as $event): ?>
                <div class="col-lg-12">
                    <hr /><h3><?php echo Html::a($event->name, [
                            'event/index',
                            'id' => $event->id,
                        ]); ?></h3><hr />
                </div>
            <?php endforeach; ?>
        </span>
    </div>
</div>

