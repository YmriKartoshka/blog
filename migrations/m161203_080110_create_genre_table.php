<?php

use yii\db\Migration;

/**
 * Handles the creation for table `genre`.
 */
class m161203_080110_create_genre_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%genre}}', [
            'id'   => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%genre}}');
    }
}
