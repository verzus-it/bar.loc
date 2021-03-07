<?php

namespace app\modules\crm\controllers;

use app\models\Ingridient;
use app\models\ProductComposition;
use app\models\ProductOption;
use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionUpdateComposition($id){
	    
    	$model = $id ? ProductComposition::findOne($id) : new ProductComposition();
	    return $this->renderAjax('updateComposition', [
		    'model' => $model,
		    'ingridients' => Ingridient::find()->select('id, title')->all()
	    ]);
    }

    public function actionUpdateOption($id){
	    
    	$model = $id ? ProductOption::findOne($id) : new ProductOption();
	    return $this->renderAjax('updateOption', [
		    'model' => $model
	    ]);
    }
    
    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
	    $model = $id ? $this->findModel($id) : new Product();
		if(Yii::$app->request->isPost){
		
		}
	    if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    public function actionSaveProductComposition(){
	    $model = (int)Yii::$app->request->post()['id'] ? ProductComposition::findOne(Yii::$app->request->post()['id']) : new ProductComposition();
	    
	    $model->load(Yii::$app->request->post(), '');
	    $model->displayed = (int)(bool)Yii::$app->request->post()['displayed'];
	    $model->active = (int)(bool)Yii::$app->request->post()['active'];
	    $model->productID = (int)Yii::$app->request->get()['productID'];
	    
	    if ($model->save()) {
		    return json_encode(['status' => true]);
	    }else{
		    return json_encode(['status' => false]);
	    }
    }
    
    public function actionSaveProductOption(){
	    $model = (int)Yii::$app->request->post()['id'] ? ProductOption::findOne(Yii::$app->request->post()['id']) : new ProductOption();
	    
	    $model->load(Yii::$app->request->post(), '');
	    $model->active = (int)(bool)Yii::$app->request->post()['active'];
	    $model->productID = (int)Yii::$app->request->get()['productID'];
	    
	    if ($model->save()) {
		    return json_encode(['status' => true]);
	    }else{
		    return json_encode(['status' => false]);
	    }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
