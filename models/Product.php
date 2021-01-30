<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $title Название
 * @property float|null $price Цена
 * @property string|null $description Описание
 * @property string|null $productCategory Код категории товара
 */
class Product extends \yii\db\ActiveRecord
{
	/**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['description', 'optionTitle'], 'string'],
            [['title', 'productCategory'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'price' => 'Стоимость',
            'description' => 'Описание',
            'productCategory' => 'Тип товара',
            'optionTitle' => 'Название опции',
        ];
    }
	
	public function getDescription(){
    	return trim($this->description) ?: ' - ';
    }
}
