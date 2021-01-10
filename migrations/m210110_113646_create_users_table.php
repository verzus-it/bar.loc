<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m210110_113646_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
	        'name' => $this->string(50)->comment('Имя'),
	        'surname' => $this->string(50)->comment('Фамилия'),
	        'birthdate' => $this->date()->comment('Дата рождения'),
	        'gender' => $this->string(20)->comment('Пол'),
	        'email' => $this->string(100)->comment('Почта'),
	        'phone' => $this->string(100)->comment('Телефон в международном формате'),
	        'createdDate' => $this->dateTime()->comment('Дата создания'),
	        'updatedDate' => $this->dateTime()->comment('Дата изменения'),
	        'active' => $this->tinyInteger(1)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
