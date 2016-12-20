<?php

use yii\db\Migration;

/**
 * Handles the creation for table `coomments`.
 */
class m161219_021410_create_coomments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%comments}}', [
            'id'         => $this->primaryKey(),
            'message'    => $this->string(100)->notNull(),
            'grade'      => $this->integer(),
            'isShown'    => $this->smallInteger(1)->notNull()->defaultValue(1),
            'creatorId'  => $this->integer(),
            'createDate' => $this->date(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%comments}}');
    }
}
