<?php

/* @var $this yii\web\View */

$this->title = 'Knigopoisk';
?>
<?php use yii\helpers\Html; ?>
<?php if (Yii::$app->session->hasFlash('PostDeletedError')): ?>
    <div class="alert alert-error">
        There was an error deleting your post!
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('CommentDeletedError')): ?>
    <div class="alert alert-error">
        There was an error deleting your post!
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('PostDeleted')): ?>
    <div class="alert alert-success">
        Your post has successfully been deleted!
    </div>
<?php endif; ?>
<div class="clearfix"></div>
<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Title</td>
    </tr>
    <?php foreach ($books as $book): ?>
        <tr>
            <td>
                <?php echo Html::a($book->id, [
                    'book/index',
                    'id' => $book->id,
                ]); ?>
            </td>
            <td><?php echo Html::a($book->name, [
                    'book/index',
                    'id' => $book->id,
                ]); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
