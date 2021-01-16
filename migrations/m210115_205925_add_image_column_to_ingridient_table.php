<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%ingridients}}`.
 */
class m210115_205925_add_image_column_to_ingridient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ingridient', 'image', $this->string(250));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('ingridient', 'image');
    }
}
