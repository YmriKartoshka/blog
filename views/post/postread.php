<?php 
	use yii\helpers\Html; 
?>
<div class="pull-right btn-group">
    <?php if(Yii::$app->user->id === $post->author_id) echo Html::a('Update', ['post/update', 'id' => $post->id], ['class' => 'btn btn-primary']); ?>
    <?php if(Yii::$app->user->id === $post->author_id) echo Html::a('Delete', ['post/delete', 'id' => $post->id], ['class' => 'btn btn-danger']); ?>
</div>
 
<?php if(Yii::$app->session->hasFlash('CommentDeleted')): ?>
	<div class="alert alert-success">
		Your post has successfully been deleted!
	</div>
<?php endif; ?>
 
<h1><?php echo $post->title; ?></h1>
<p><?php echo $post->content; ?></p>
<hr />
<time>Created On: <?php echo date('F j, Y', $post->create_time); ?></time><br />
<time>Updated On: <?php echo date('F j, Y', $post->update_time); ?></time>
<h2>Comments</h2>
<div class="clearfix"></div>
<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Content</td>
        <td>Options</td>
    </tr>
    <?php foreach ($comments as $comment): ?>
        <tr>
            <td>
                <?php echo $comment->author_id; ?>
            </td>
            <td>
				<?php echo $comment->content; ?>
			</td>
            <td>
                <?php if($comment->author_id === Yii::$app->user->id) echo Html::a('up', ['post/read','id'=>$comment->post_id, 'id_comment'=>$comment->id], ['class'=>'icon icon-edit']); ?>
                <?php if($comment->author_id === Yii::$app->user->id) echo Html::a('del', ['comment/delete', 'id'=>$comment->id], ['class'=>'icon icon-trash']); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php if(!Yii::$app->user->isGuest) echo $this->render('\..\comment\commentcreate', ['newcomment' => $newcomment, 'id' => $post->id]); ?>
