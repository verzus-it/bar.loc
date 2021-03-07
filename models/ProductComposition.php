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
 * @property int|null $active Входит в состав товара
 * @property int|null $displayed Видимый клиенту
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
            [['productID', 'ingridientID', 'amountInProduct', 'active', 'displayed'], 'integer'],
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
            'active' => 'Active',
            'displayed' => 'Displayed',
        ];
    }
    
    public function getProduct(){
    	return $this->hasOne(Product::className(), ['id' => 'productID']);
    }
    
    public function getIngridient(){
    	return $this->hasOne(Ingridient::className(), ['id' => 'ingridientID']);
    }
}
