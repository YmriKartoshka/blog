<?php

use yii\db\Migration;

/**
 * Handles the creation for table `event`.
 */
class m161220_124854_create_event_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%event}}', [
            'id'          => $this->primaryKey(),
            'name'        => $this->string(),
            'description' => $this->string(),
            'date'        => $this->date(),
            'bookId'      => $this->integer(),
            'publish'     => $this->smallInteger(1)->defaultValue(1),
            'creatorId'   => $this->integer(),
            'createDate'  => $this->date(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%event}}');
    }
}
