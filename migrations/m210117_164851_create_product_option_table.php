<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_option}}`.
 */
class m210117_164851_create_product_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_option', [
            'id' => $this->primaryKey(),
	        'productID' => $this->integer(50)->comment('ID товара'),
	        'title' => $this->string(200)->comment('Название опции'),
	        'price' => $this->decimal(50, 2)->comment('Цена товара с этой опцией'),
	        'active' => $this->tinyInteger(1)->defaultValue(1)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_option');
    }
}
