<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_composition}}`.
 */
class m210112_204437_create_product_composition_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_composition', [
            'id' => $this->primaryKey(),
	        'productID' => $this->integer(50)->comment('Товар'),
	        'ingridientID' => $this->integer(50)->comment('Ингридиент'),
	        'amountInProduct' => $this->integer(50)->comment('Количество ингридиента в продукте. В граммах или милилитрах'),
        ]);
	    $this->dropColumn('ingridient', 'productID');
	    $this->dropColumn('ingridient', 'amountInProduct');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_composition');
        $this->addColumn('ingridient', 'productID', $this->integer(50)->comment('Продукт')->notNull());
        $this->addColumn('ingridient', 'amountInProduct', $this->integer(50)->comment('Количество в продукте. В граммах или милилитрах'));
    }
}
