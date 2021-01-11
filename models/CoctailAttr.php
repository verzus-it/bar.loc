<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coctail_attr".
 *
 * @property int $id
 * @property int $coctailID ID коктейля
 * @property int|null $alcoholContent Крепкость, содержание алкоголя
 * @property string|null $taste Вкус
 * @property int $active
 */
class CoctailAttr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coctail_attr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coctailID'], 'required'],
            [['coctailID', 'alcoholContent', 'active'], 'integer'],
            [['taste'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'coctailID' => 'Coctail ID',
            'alcoholContent' => 'Alcohol Content',
            'taste' => 'Taste',
            'active' => 'Active',
        ];
    }
}
