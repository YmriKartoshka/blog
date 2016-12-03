<?php

use yii\db\Migration;

class m161203_080256_create_book_genre_linktable extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%bglink}}', [
            'idBook' => $this->integer()->notNull(),
            'idGenre' => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('bgpk', '{{%bglink}}', [
            'idBook',
            'idGenre',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%bglink}}');
    }
}
