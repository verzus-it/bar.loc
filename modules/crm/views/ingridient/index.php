<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\IngridientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ингридиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingridient-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить ингидиент', ['update', 'id' => 0], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'title',
            'price',

	        [
		        'attribute' => 'image',
		        'format' => 'html',
		        'value' => function($data){
			        return $data->image ? Html::img('@web/'.$data->image, ['style' => ['max-width' => '150px', 'max-height' => '150px'], 'class' => 'center-block']) : '';
		        }
	        ],
            [
				'attribute' => 'visible',
				'value' => function($data){
					return $data->visible ? 'да' : 'нет';
				}
			],
            'description:ntext',
	        [
		        'attribute' => 'active',
		        'value' => function($data){
			        return $data->active ? 'да' : 'нет';
		        }
	        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
