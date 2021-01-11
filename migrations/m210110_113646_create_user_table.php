<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m210110_113646_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
	        'name' => $this->string(50)->comment('Имя'),
	        'surname' => $this->string(50)->comment('Фамилия'),
	        'birthdate' => $this->date()->comment('Дата рождения'),
	        'gender' => $this->string(20)->comment('Пол'),
	        'email' => $this->string(100)->comment('Почта')->notNull(),
	        'phone' => $this->string(100)->comment('Телефон в международном формате'),
	        'createdDate' => $this->dateTime()->comment('Дата создания')->notNull(),
	        'updatedDate' => $this->dateTime()->comment('Дата изменения')->notNull(),
	        'password' => $this->string(200)->comment('Пароль')->notNull(),
	        'authKey' => $this->string(200)->comment('Ключ')->notNull(),
	        'accessToken' => $this->string(200)->comment('Токен доступа')->notNull(),
	        'active' => $this->tinyInteger(1)->defaultValue(1)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
