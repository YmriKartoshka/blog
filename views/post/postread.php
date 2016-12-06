<?php
use yii\helpers\Html;
?>
    <div class="pull-right btn-group">
        <?php if(Yii::$app->user->id === $post->author_id) echo Html::a('Update', array('post/update', 'id' => $post->id), array('class' => 'btn btn-primary')); ?>
        <?php if(Yii::$app->user->id === $post->author_id) echo Html::a('Delete', array('post/delete', 'id' => $post->id), array('class' => 'btn btn-danger')); ?>
    </div>

<?php if(Yii::$app->session->hasFlash('CommentDeleted')): ?>
    <div class="alert alert-success">
        Your post has successfully been deleted!
    </div>
<?php endif; ?>

    <h1><?php echo $post->title; ?></h1>
    <time><?php echo 'Post created: ' . date('F j, Y', $post->create_time); ?></time><br /><br />
    <p><?php echo $post->content; ?></p>

    <hr />
    <h3>Comments</h3>
    <div class="clearfix"></div>

    <div class="row">
        <?php
        /**
         * @var \app\models\Comment[] $comments
         */
        ?>
        <?php foreach ($comments as $comment): ?>
            <div class="col-lg-12">
                <br />
                <p>Author: <?php echo $comment->author->username; ?></p>
                <p><?php echo $comment->content; ?></p>
                <p><?php if($comment->author_id === Yii::$app->user->id) echo Html::a('Update', array('post/read','id'=>$comment->post_id, 'id_comment'=>$comment->id), array('class'=>'icon icon-edit')); ?>
                    <?php if($comment->author_id === Yii::$app->user->id) echo Html::a('Delete', array('comment/delete', 'id'=>$comment->id), array('class'=>'icon icon-trash')); ?></p>
            </div>
        <?php endforeach; ?>
    </div><hr />
<?php if(!Yii::$app->user->isGuest) echo $this->render('..' . DIRECTORY_SEPARATOR . 'comment' . DIRECTORY_SEPARATOR . 'commentcreate', array('newcomment' => $newcomment)); ?>