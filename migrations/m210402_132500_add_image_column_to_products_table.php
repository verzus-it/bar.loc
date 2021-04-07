<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%products}}`.
 */
class m210402_132500_add_image_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('product', 'image', $this->string(200)->defaultValue(null)->comment('Фото товара'));
	    $this->addColumn('product', 'recipe', $this->text()->comment('Рецепт'));
	    $this->addColumn('product', 'whatToDo', $this->text()->comment('Что нужно сделать клиенту'));
	    $this->dropColumn('product', 'price');
	    $this->dropColumn('product', 'optionTitle');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropColumn('product', 'image');
	    $this->dropColumn('product', 'recipe');
	    $this->dropColumn('product', 'whatToDo');
	    $this->addColumn('product', 'optionTitle', $this->string(200)->defaultValue('')->comment('Название опции по-умолчанию'));
	    $this->addColumn('product', 'price', $this->decimal(50, 2)->defaultValue(null)->comment('Цена опции по-умолчанию'));
    }
}
