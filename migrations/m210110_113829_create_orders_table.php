<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m210110_113829_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'userID' => $this->integer(50)->comment('ID пользователя'),
            'price' => $this->decimal(10, 2)->comment('Сумма заказа'),
            'deliveryType' => $this->string(20)->comment('Код способа доставки'),
            'deliveryData' => $this->text()->comment('Данные доставки'),
            'deliveryPrice' => $this->decimal(10, 2)->comment('Стоимость доставки'),
            'paymentType' => $this->string(20)->comment('Код метода оплаты'),
            'status' => $this->string(20)->comment('Статус заказа'),
            'active' => $this->tinyInteger(1)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
