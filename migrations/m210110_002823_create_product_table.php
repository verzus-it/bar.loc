<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m210110_002823_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
	        'title' => $this->string(['length' => 50])->comment('Название'),
	        'price' => $this->decimal(50, 2)->comment('Цена'),
	        'description' => $this->text()->comment('Описание'),
	        'productCategory' => $this->string(50)->comment('Код категории товара'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
