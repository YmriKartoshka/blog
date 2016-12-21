<?php

use yii\helpers\Html;
use app\models\event\Subscription;

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
                     'event/update',
                     'id' => $model->id,
                 ], ['class' => 'btn btn-primary']);
             }
             if (Subscription::hasSubscription(Yii::$app->user->id, $model->id)) {
                 echo Html::a('Unsubscribe', [
                     'subscription/delete',
                     'id' => $model->id,
                 ], ['class' => 'btn btn-primary']);
             }
             else
             {
                 echo Html::a('Subscribe', [
                     'subscription/create',
                     'id' => $model->id,
                 ], ['class' => 'btn btn-primary']);
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
<p><?php echo 'Date of the event: ' . $model->date; ?></p>
<p><?php echo 'Book: ' . Html::a($model->book->name, [
            'book/index',
            'id' => $model->book->id,
        ]); ?></p>
<p><?php echo 'Subscriptions: ' . Html::a(count($model->subscription), [
        'subscription/index',
        'id' => $model->id,
    ]); ?></p>
<p><?php echo $model->description; ?></p>
<hr />

<h2>Comments</h2>
<div class="row">
    <?php foreach ($model->comment as $comment): ?>
        <div class="col-lg-12">
            <br />
            <p>Author: <?php echo Html::a($comment->author->firstName . ' ' . $comment->author->lastName, [
                    'profile/index',
                    'id' => $comment->author->id,
                ]); ?>
            </p>
            <p><?php echo 'Grade: ' . $comment->grade; ?></p>
            <p><?php echo $comment->message; ?></p>
        </div>
    <?php endforeach; ?>
</div><hr />

<?php if (! Yii::$app->user->isGuest) {
    echo $this->render('../comment/createevent', [
        'newcomment' => $newcomment,
        'id'         => $model->id,
    ]);
} ?>

