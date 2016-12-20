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
        <h1><?php echo 'Profile'?></h1>
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

    <div class="col-lg-6">
        <span class="pull-right">
            <h4><?php echo 'Actions:'?></h4>
            <h4><?php echo Html::a('create book', array('book/create')) ?> </h4>
            <h4><?php echo Html::a('create event', array('event/create')) ?> </h4>
            <h4><?php echo Html::a('create author', array('author/create')) ?> </h4>
            <h4><?php echo Html::a('create genre', array('genre/create')) ?> </h4>
        </span>
    </div>
    <div class="col-lg-12">
        <span class="text-left">
            <hr/><h3><?php echo 'Created by ' . Yii::$app->user->identity->login . ':'?></h3><br/>
            <!--        --><?php //foreach ($books as $book): ?>
            <!--            <div class="col-lg-12">-->
            <!--                <br/><h4>--><?php //echo Html::a($book->name, array('book/index', 'id'=>$book->id)); ?><!--</h4>-->
            <!--            </div>-->
            <!--        --><?php //endforeach; ?>
            <br/><h4><?php echo 'Book1 from current user'?></h4>
            <br/> <h4><?php echo 'Book2 from current user'?></h4>
            <br/><h4><?php echo 'Book3 from current user'?></h4>
        </span>
    </div>
</div>

