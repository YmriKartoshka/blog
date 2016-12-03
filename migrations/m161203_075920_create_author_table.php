<?php

use yii\db\Migration;

/**
 * Handles the creation for table `author`.
 */
class m161203_075920_create_author_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%author}}', [
            'id'         => $this->primaryKey(),
            'firstName'  => $this->string(),
            'lastName'   => $this->string(),
            'secondName' => $this->string(),
            'birthDay'   => $this->date(),
            'deathDay'   => $this->date(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%author}}');
    }
}
