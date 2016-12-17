<?php
/**
 * Created by PhpStorm.
 * User: minaevaolga
 * Date: 12/3/16
 * Time: 1:23 AM
 */

use yii\helpers\Html;

echo Html::beginForm(['/book/create'], 'post')
    . Html::submitButton(
        'Create book',
        ['class' => 'btn btn-link']
    )
    . Html::endForm();

echo Html::beginForm(['/event/create'], 'post')
    . Html::submitButton(
        'Create event',
        ['class' => 'btn btn-link']
    )
    . Html::endForm();
?>

