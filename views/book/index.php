<?php
/**
 * Created by PhpStorm.
 * User: minaevaolga
 * Date: 12/4/16
 * Time: 11:20 PM
 */

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
<h3>Comments</h3>
<div class="clearfix"></div>

