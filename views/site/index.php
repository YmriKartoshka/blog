<?php

/* @var $this yii\web\View */

$this->title = 'News';
?>
<?php use yii\helpers\Html; ?>
<?php if(Yii::$app->session->hasFlash('PostDeletedError')): ?>
    <div class="alert alert-error">
        There was an error deleting your post!
    </div>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('CommentDeletedError')): ?>
    <div class="alert alert-error">
        There was an error deleting your post!
    </div>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('PostDeleted')): ?>
    <div class="alert alert-success">
        Your post has successfully been deleted!
    </div>
<?php endif; ?>

<!--<div class="row">-->
<!--    --><?php //foreach ($data as $post): ?>
<!--        <div class="col-lg-12">-->
<!--            <hr />-->
<!--            <h2>--><?php //echo Html::a($post->title, array('post/read', 'id'=>$post->id)); ?><!--</h2>-->
<!--            <p>--><?php //echo $post->content; ?><!--</p>-->
<!--            <p>--><?php //if(Yii::$app->user->id === $post->author_id) echo Html::a('Update', array('post/update', 'id'=>$post->id), array('class'=>'icon icon-edit')); ?>
<!--                --><?php //if(Yii::$app->user->id === $post->author_id) echo Html::a('Delete', array('post/delete', 'id'=>$post->id), array('class'=>'icon icon-trash')); ?><!--</p>-->
<!--            <!--            <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>-->-->
<!--            <hr />-->
<!--        </div>-->
<!--    --><?php //endforeach; ?>
<!--</div>-->

