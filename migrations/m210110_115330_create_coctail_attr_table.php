<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders_coctails_attrs}}`.
 */
class m210110_115330_create_coctail_attr_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%coctail_attr}}', [
            'id' => $this->primaryKey(),
	        'coctailID' => $this->integer(50)->comment('ID коктейля')->notNull(),
	        'alcoholContent' => $this->integer(50)->comment('Крепкость, содержание алкоголя'),
	        'taste' => $this->string(250)->comment('Вкус'),
	        'active' => $this->tinyInteger(1)->defaultValue(1)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%coctail_attr}}');
    }
}
