<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product_composition}}`.
 */
class m210216_190249_add_active_column_to_product_composition_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('product_composition', 'active', $this->integer(1)->defaultValue(1)->comment('Входит в состав товара'));
	    $this->addColumn('product_composition', 'displayed', $this->integer(1)->defaultValue(1)->comment('Видимый клиенту'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropColumn('product', 'active');
	    $this->dropColumn('product', 'displayed');
    }
}
