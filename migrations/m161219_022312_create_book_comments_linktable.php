<?php

use yii\db\Migration;

class m161219_022312_create_book_comments_linktable extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%bclink}}', [
            'idBook'    => $this->integer()->notNull(),
            'idComment' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('bcpk', '{{%bclink}}', [
            'idBook',
            'idComment',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%bclink}}');
    }
}
