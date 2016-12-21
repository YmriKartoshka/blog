<?php

use yii\db\Migration;

/**
 * Handles the creation for table `event_subscriptions`.
 */
class m161220_125453_create_event_subscriptions_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('{{%subscriptions}}', [
            'idEvent' => $this->integer()->notNull(),
            'idUser'  => $this->integer()->notNull(),
        ]);
        $this->addPrimaryKey('eupk', '{{%subscriptions}}', [
            'idEvent',
            'idUser',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('{{%subscriptions}}');
    }
}
