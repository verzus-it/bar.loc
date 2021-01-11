<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $userID ID пользователя
 * @property float $totalAmount Общая сумма заказа
 * @property float $productTotalAmount Сумма заказа товаров
 * @property string|null $deliveryType Код способа доставки
 * @property string|null $deliveryData Данные доставки
 * @property float|null $deliveryPrice Стоимость доставки
 * @property string|null $paymentType Код метода оплаты
 * @property string|null $status Статус заказа
 * @property int $active
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userID', 'totalAmount', 'productTotalAmount'], 'required'],
            [['userID', 'active'], 'integer'],
            [['totalAmount', 'productTotalAmount', 'deliveryPrice'], 'number'],
            [['deliveryData'], 'string'],
            [['deliveryType', 'paymentType', 'status'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userID' => 'User ID',
            'totalAmount' => 'Total Amount',
            'productTotalAmount' => 'Product Total Amount',
            'deliveryType' => 'Delivery Type',
            'deliveryData' => 'Delivery Data',
            'deliveryPrice' => 'Delivery Price',
            'paymentType' => 'Payment Type',
            'status' => 'Status',
            'active' => 'Active',
        ];
    }
}
