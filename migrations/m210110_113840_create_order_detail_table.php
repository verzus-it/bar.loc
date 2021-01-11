<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders_details}}`.
 */
class m210110_113840_create_order_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_detail}}', [
            'id' => $this->primaryKey(),
	        'orderID' => $this->integer(50)->comment('ID заказа')->notNull(),
	        'productID' => $this->integer(50)->comment('ID товара')->notNull(),
	        'price' => $this->decimal(10, 2)->comment('Стоимость за еденицу')->notNull(),
	        'qty' => $this->integer(5)->comment('Количество')->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_detail}}');
    }
}
