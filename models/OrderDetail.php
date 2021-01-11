<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_detail".
 *
 * @property int $id
 * @property int $orderID ID заказа
 * @property int $productID ID товара
 * @property float $price Стоимость за еденицу
 * @property int $qty Количество
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderID', 'productID', 'price', 'qty'], 'required'],
            [['orderID', 'productID', 'qty'], 'integer'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderID' => 'Order ID',
            'productID' => 'Product ID',
            'price' => 'Price',
            'qty' => 'Qty',
        ];
    }
}
