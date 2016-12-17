<?php

use yii\db\Migration;

class m161216_103014_fakeData extends Migration
{
    /**
     * Безопасная (в транзакции) инициализация.
     *
     * @return void
     */
    public function safeUp()
    {
        $this->insert('{{%author}}', [
            'firstName'  => 'Алексанр',
            'lastName'   => 'Пушкин',
            'secondName' => 'Сергеевич',
            'birthDay'   => '1799-06-06',
            'deathDay'   => '1799-02-10',
        ]);
        $this->insert('{{%author}}', [
            'firstName'  => 'Лев',
            'lastName'   => 'Толстой',
            'secondName' => 'Николаевич',
            'birthDay'   => '1828-09-09',
            'deathDay'   => '1910-11-20',
        ]);
        $this->insert('{{%author}}', [
            'firstName'  => 'Михаил',
            'lastName'   => 'Лермонтов',
            'secondName' => 'Юрьевич',
            'birthDay'   => '1814-10-15',
            'deathDay'   => '1841-07-27',
        ]);
        $this->insert('{{%genre}}', [
            'name' => 'Ужасы',
        ]);
        $this->insert('{{%genre}}', [
            'name' => 'Фантастика',
        ]);
        $this->insert('{{%genre}}', [
            'name' => 'Детектив',
        ]);
    }

    /**
     * Безопасный метод деинициализации.
     *
     * @return void
     */
    public function safeDown()
    {
    }
}
