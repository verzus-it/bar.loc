<?php

namespace app\models;

use Yii;
use yii\helpers\VarDumper;

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
            [['description', 'recipe', 'whatToDo'], 'string'],
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
            'description' => 'Описание',
            'productCategory' => 'Тип товара',
            'whatToDo' => 'Что нужно делать клиенту',
            'image' => 'Фото',
            'recipe' => 'Рецепт',
        ];
    }
	
	public function getDescription(){
    	return trim($this->description) ?: ' - ';
    }
	
	public function getRecipe(){
    	return trim($this->recipe) ?: ' - ';
    }
	
	public function getWhatToDo(){
    	return trim($this->whatToDo) ?: ' - ';
    }
    
    public function getImage(){
        return file_exists($this->image) ? $this->image : 'uploads/products/golubaja_loguna_logo-850x639.jpg';
    }
    
    public function getCostPrice(){
    	$costPrice = 0;
    	if($this->composition){
		    foreach($this->composition as $item){
			   $costPrice+= $item->ingridient->price * $item->amountInProduct / 1000;
    		}
	    }
    	return $costPrice;
    }
	
	public function getComposition()
	{
		return $this->hasMany(ProductComposition::className(), ['productID' => 'id']);
	}
	
	public function getOptions()
	{
		return $this->hasMany(ProductOption::className(), ['productID' => 'id']);
	}
}
