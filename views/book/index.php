<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pull-right btn-group">
    <?php if (Yii::$app->user->id === $userId) {
        echo Html::a('Update', [
            'book/update',
            'id' => $model->id,
        ], ['class' => 'btn btn-primary']);
    } ?>
</div>

<h1><?php echo $model->name; ?></h1>
<time><?php echo 'Date of publication: ' . $model->createDate; ?></time><br /><br />
<p><?php echo 'Author: ' . $model->author->lastName . ' ' . $model->author->firstName . ' ' . $model->author->secondName; ?></p>
<p><?php echo 'Genre: ' . $model->genre->name; ?></p>
<p><?php echo 'Year of publication: ' . $model->year; ?></p>
<p><?php echo $model->description; ?></p>

<hr />
<h2>Comments</h2>
<div class="clearfix"></div>
<table class="table table-striped table-hover">
    <tr>
        <td>Author</td>
        <td>Content</td>
    </tr>
    <?php foreach ($model->comment as $comment): ?>
        <tr>
            <td>
                <?php echo Html::a($comment->author->firstName . ' ' . $comment->author->lastName, [
                    'profile/index',
                    'id' => $comment->author->id,
                ]); ?>
            </td>
            <td>
				<?php echo $comment->message; ?>
			</td>
        </tr>
    <?php endforeach; ?>
</table>
<?php if (! Yii::$app->user->isGuest) {
    echo $this->render('../comment/create', [
        'newcomment' => $newcomment,
        'id'         => $model->id,
    ]);
} ?>

