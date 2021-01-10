<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders_details}}`.
 */
class m210110_113840_create_orders_details_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders_details}}', [
            'id' => $this->primaryKey(),
	        'orderID' => $this->integer(50)->comment('ID заказа'),
	        'productID' => $this->integer(50)->comment('ID товара'),
	        'price' => $this->decimal(10, 2)->comment('Стоимость за еденицу'),
	        'qty' => $this->integer(5)->comment('Количество'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders_details}}');
    }
}
