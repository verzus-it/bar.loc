<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_image}}`.
 */
class m210117_164909_create_product_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_image', [
            'id' => $this->primaryKey(),
	        'productID' => $this->integer(50)->comment('ID товара'),
	        'image' => $this->string(250)->comment('Путь к изображению относительно корня сайта'),
	        'isMain' => $this->integer(1)->defaultValue(0)->comment('Является ли главной'),
	        'active' => $this->tinyInteger(1)->defaultValue(1)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_image');
    }
}
