<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m161126_070042_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%user}}', [
            'id'           => $this->primaryKey(),
            'login'        => $this->string(50)->notNull()->unique(),
            'passwordHash' => $this->string(255)->notNull(),
            'profileId'    => $this->integer()->notNull(),
            'isBan'        => $this->smallInteger(1)->notNull()->defaultValue(0),
            'isModerator'  => $this->smallInteger(1)->notNull()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%user}}');
    }
}
