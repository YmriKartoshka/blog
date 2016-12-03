<?php

use yii\db\Migration;

/**
 * Handles the creation for table `profile`.
 */
class m161126_071531_create_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%profile}}', [
            'id'         => $this->primaryKey(),
            'firstName'  => $this->string(50),
            'lastName'   => $this->string(50),
            'secondName' => $this->string(50),
            'email'      => $this->string(100),
            'phone'      => $this->bigInteger(),
        ]);
        $this->insert('{{%profile}}', [
            'firstName'  => 'firstName',
            'lastName'   => 'lastName',
            'secondName' => 'secondName',
            'email'      => 'admin@mail.ru',
            'phone'      => 88005553535,
        ]);
        $this->insert('{{%user}}', [
            'login'        => 'admin',
            'passwordHash' => Yii::$app->security->generatePasswordHash('123456'),
            'profileId'    => '1',
            'isModerator'  => 1,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->delete('{{%profile}}', ['id' => 1]);
        $this->delete('{{%user}}', ['id' => 1]);
        $this->dropTable('{{%profile}}');
    }
}
