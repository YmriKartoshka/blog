<?php

use yii\db\Migration;

class m161220_130116_create_event_comments_linktable extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%eclink}}', [
            'idEvent'   => $this->integer()->notNull(),
            'idComment' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('ecpk', '{{%eclink}}', [
            'idEvent',
            'idComment',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%eclink}}');
    }
}
