<?php

use yii\db\Migration;

/**
 * Handles the creation for table `book`.
 */
class m161203_075251_create_book_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%book}}', [
            'id'          => $this->primaryKey(),
            'name'        => $this->string(),
            'description' => $this->string(),
            'coverImage'  => $this->string(),
            'year'        => $this->integer(),
            'authorId'    => $this->integer(),
            'genreId'     => $this->integer(),
            'publish'     => $this->smallInteger(1)->defaultValue(0),
            'creatorId'   => $this->integer(),
            'createDate'  => $this->date(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%book}}');
    }
}
