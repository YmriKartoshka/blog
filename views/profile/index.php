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

<div class="pull-right btn-group">
    <?php if (Yii::$app->user->id === $profile->id) {
        echo Html::a('Update', [
            'profile/update',
            'id' => $profile->id,
        ], ['class' => 'btn btn-primary']);
    } ?>
</div>

<p><?php echo 'First Name: ' . $profile->firstName; ?></p>
<p><?php echo 'Last Name: ' . $profile->lastName; ?></p>
<p><?php echo 'Second Name: ' . $profile->secondName; ?></p>
<p><?php echo 'Email: ' . $profile->email; ?></p>
<p><?php echo 'Phone: ' . $profile->phone; ?></p>

<?php
echo Html::beginForm(['/book/create'], 'post') . Html::submitButton('Create book', ['class' => 'btn btn-link']) . Html::endForm();

echo Html::beginForm(['/author/create'], 'post') . Html::submitButton('Create author', ['class' => 'btn btn-link']) . Html::endForm();

echo Html::beginForm(['/genre/create'], 'post') . Html::submitButton('Create genre', ['class' => 'btn btn-link']) . Html::endForm();

echo Html::beginForm(['/event/create'], 'post') . Html::submitButton('Create event', ['class' => 'btn btn-link']) . Html::endForm();
?>


