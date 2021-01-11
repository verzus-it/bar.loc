<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m210110_113829_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'userID' => $this->integer(50)->comment('ID пользователя')->notNull(),
            'totalAmount' => $this->decimal(10, 2)->comment('Общая сумма заказа')->notNull(),
            'productTotalAmount' => $this->decimal(10, 2)->comment('Сумма заказа товаров')->notNull(),
            'deliveryType' => $this->string(20)->comment('Код способа доставки'),
            'deliveryData' => $this->text()->comment('Данные доставки'),
            'deliveryPrice' => $this->decimal(10, 2)->comment('Стоимость доставки'),
            'paymentType' => $this->string(20)->comment('Код метода оплаты'),
            'status' => $this->string(20)->comment('Статус заказа'),
            'active' => $this->tinyInteger(1)->defaultValue(1)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
