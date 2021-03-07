<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_option".
 *
 * @property int $id
 * @property int|null $productID ID товара
 * @property string|null $title Название опции
 * @property float|null $price Цена товара с этой опцией
 * @property int $active
 */
class ProductOption extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productID', 'active'], 'integer'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productID' => 'Product ID',
            'title' => 'Title',
            'price' => 'Price',
            'active' => 'Active',
        ];
    }
}
