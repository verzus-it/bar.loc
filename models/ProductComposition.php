<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_composition".
 *
 * @property int $id
 * @property int|null $productID Товар
 * @property int|null $ingridientID Ингридиент
 * @property int|null $amountInProduct Количество ингридиента в продукте. В граммах или милилитрах
 */
class ProductComposition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_composition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productID', 'ingridientID', 'amountInProduct'], 'integer'],
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
            'ingridientID' => 'Ingridient ID',
            'amountInProduct' => 'Amount In Product',
        ];
    }
}
