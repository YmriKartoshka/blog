<?php

use yii\db\Migration;

class m161203_080305_create_book_author_linktable extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%balink}}', [
            'idBook'   => $this->integer()->notNull(),
            'idAuthor' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('bapk', '{{%balink}}', [
            'idBook',
            'idAuthor',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%balink}}');
    }
}
