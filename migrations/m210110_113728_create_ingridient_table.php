<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ingridients}}`.
 */
class m210110_113728_create_ingridient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ingridient}}', [
            'id' => $this->primaryKey(),
	        'title' => $this->string(50)->comment('Название'),
	        'price' => $this->decimal(10, 2)->comment('Стоимость за литр или килограм'),
	        'visible' => $this->tinyInteger(1)->defaultValue(1)->comment('Видимый ли для клиента')->notNull(),
	        'description' => $this->text()->comment('Описание'),
	        'productID' => $this->integer(50)->comment('Продукт')->notNull(),
	        'amountInProduct' => $this->integer(50)->comment('Количество в продукте. В граммах или милилитрах'),
	        'active' => $this->tinyInteger(1)->defaultValue(1)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ingridient}}');
    }
}
