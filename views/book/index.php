<?php

use yii\helpers\Html;

$this->title                   = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-6">
        <h1><?php echo $model->name?></h1>
    </div>

    <div class="col-lg-6">
         <span class="pull-right">
             <?php if (Yii::$app->user->id === $userId) {
                 echo Html::a('Update', [
                     'book/update',
                     'id' => $model->id,
                 ], ['class' => 'btn btn-primary']);
             }
             if ($isModerator) {
                 if($model->publish)
                 {
                     echo Html::a('Block', [
                         'book/hide',
                         'id' => $model->id,
                     ], ['class' => 'btn btn-primary']);
                 }
                 else{
                     echo Html::a('Unblock', [
                         'book/hide',
                         'id' => $model->id,
                     ], ['class' => 'btn btn-primary']);
                 }
             }?>
         </span>
    </div>
</div>
<hr/>

<time><?php echo 'Date of publication: ' . $model->createDate; ?></time><br />
<?php echo 'Creator ' . Html::a($model->creator->firstName . ' ' . $model->creator->lastName, [
        'profile/index',
        'id' => $model->creator->id,
    ]); ?><br /><br />
<p><?php echo 'Author: ' . $model->author->lastName . ' ' . $model->author->firstName . ' ' . $model->author->secondName; ?></p>
<p><?php echo 'Genre: ' . $model->genre->name; ?></p>
<p><?php echo 'Year of publication: ' . $model->year; ?></p>
<p><?php
    if ($isModerator) {
        if($model->publish)
        {
            echo 'Publish: published';
        }else{
            echo 'Publish: not published';
        }
    } ?></p>
<p><?php echo $model->description; ?></p>
<hr /><br/>

<h2>Comments</h2>
<div class="row">
    <?php foreach ($model->comment as $comment): ?>
        <div class="col-lg-12">
            <?php
            if($comment->isShown || $isModerator)
            { ?>
                <hr />
                <b><h5>Author: <?php echo Html::a($comment->author->firstName . ' ' . $comment->author->lastName, [
                    'profile/index',
                    'id' => $comment->author->id,
                ]); ?>
                </h5>
                <h5><?php echo 'Grade: ' . $comment->grade; ?></h5></b>
                <p><?php echo $comment->message; ?></p>
            <?php }
            ?>
        </div>
        <div class="col-lg-12">
        <span class="pull-right">
             <?if ($isModerator) {
                 if($comment->isShown)
                 {
                     echo Html::a('Block', [
                         'comment/hidebook',
                         'id' => $comment->id,
                         'book' => $model->id,
                     ], ['class' => 'btn btn-primary']);
                 }
                 else{
                     echo Html::a('Unblock', [
                         'comment/hidebook',
                         'id' => $comment->id,
                         'book' => $model->id,
                     ], ['class' => 'btn btn-primary']);
                 }

             }?>
         </span>
        </div>
    <?php endforeach; ?>
</div><hr />

<?php if (! Yii::$app->user->isGuest) {
    echo $this->render('../comment/createbook', [
        'newcomment' => $newcomment,
        'id'         => $model->id,
    ]);
} ?>

