<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingridient".
 *
 * @property int $id
 * @property string|null $title Название
 * @property float|null $price Стоимость за литр или килограм
 * @property int $visible Видимый ли для клиента
 * @property string|null $description Описание
 * @property int $productID Продукт
 * @property int|null $amountInProduct Количество в продукте. В граммах или милилитрах
 * @property int $active
 */
class Ingridient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingridient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['visible', 'productID', 'amountInProduct', 'active'], 'integer'],
            [['description'], 'string'],
            [['productID'], 'required'],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price',
            'visible' => 'Visible',
            'description' => 'Description',
            'productID' => 'Product ID',
            'amountInProduct' => 'Amount In Product',
            'active' => 'Active',
        ];
    }
}
