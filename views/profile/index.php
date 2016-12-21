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
<hr/>

<div class="row">
    <div class="col-lg-6">
        <p><?php echo 'First Name: ' . $profile->firstName; ?></p>
        <p><?php echo 'Last Name: ' . $profile->lastName; ?></p>
        <p><?php echo 'Second Name: ' . $profile->secondName; ?></p>
        <p><?php echo 'Email: ' . $profile->email; ?></p>
        <p><?php echo 'Phone: ' . $profile->phone; ?></p>
    </div>

    <?php if (Yii::$app->user->id === $profile->id) { ?>
        <div class="col-lg-6">
            <span class="pull-right">
                <h4><?php echo 'Actions:'?></h4>
                <h4><?php echo Html::a('create book', array('book/create')) ?> </h4>
                <h4><?php echo Html::a('create event', array('event/create')) ?> </h4>
                <h4><?php echo Html::a('create author', array('author/create')) ?> </h4>
                <h4><?php echo Html::a('create genre', array('genre/create')) ?> </h4>
            </span>
        </div>
    <?php } ?>
</div><hr/>

<div class="row">
    <div class="col-lg-6">
        <h2><?php echo 'List of Books' ?></h2>
        <h4><?php echo 'created by ' . $profile->firstName . " " . $profile->lastName . '' ?></h4>
    </div>

    <div class="col-lg-6">
         <span class="pull-right">
             <?= Html::a('Show events', [
                 'events',
                 'id' => $profile->id,
             ], ['class' => 'btn btn-primary']); ?>
         </span>
    </div>
</div><hr/>

<div class="col-lg-12">
    <span class="text-left">
        <?php foreach ($books as $book): ?>
            <div class="col-lg-12">
                <h3><?php echo Html::a($book->name, [
                        'book/index',
                        'id' => $book->id,
                    ]); ?>
                </h3><hr/>
            </div>
        <?php endforeach; ?>
    </span>
</div>