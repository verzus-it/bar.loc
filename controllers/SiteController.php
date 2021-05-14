<?php

namespace app\controllers;

use app\models\Order;
use app\models\OrderDetail;
use app\models\Product;
use app\models\ProductOption;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
	    $products = Product::find()->all();
	    
	    $cart = ['products' => [], 'totalAmount' => 0];
	    if($_SESSION['cart']){
		    foreach($_SESSION['cart'] as $optionID => $qty){
			    $productOption = ProductOption::findOne($optionID);
			    $cart['products'][$optionID]['data'] = $productOption;
			    $cart['products'][$optionID]['qty'] = $qty;
			    $cart['products'][$optionID]['amount'] = $qty * $productOption->price;
			    $cart['totalAmount'] += $qty * $productOption->price;
	    	}
	    }
        return $this->render('index', [
        	'products' => $products,
	        'cart' => $cart
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContacts()
    {
        return $this->render('contacts');
    }

    public function actionPaymentAndDelivery()
    {
        return $this->render('paymentAndDelivery');
    }
    
    public function actionChangeCart(){
	    $optionID = (int)Yii::$app->request->post()['optionID'];
	    $qty = (int)Yii::$app->request->post()['qty'];
	
	    if(!$_SESSION['cart'][$optionID]){
		    $_SESSION['cart'][$optionID] = 0;
	    }
	    
	    $_SESSION['cart'][$optionID] = max((int)$_SESSION['cart'][$optionID] + $qty, 0);
	    
	    if($_SESSION['cart'][$optionID] <= 0){
	    	unset($_SESSION['cart'][$optionID]);
	    }
	    
	    return json_encode(['status' => true]);
    }
    
    public function actionConfirmOrder(){
    	//На этапе проверки спроса просто отправляем заказ на почту нам и все
    	if($_SESSION['cart'] && array_sum($_SESSION['cart']) > 0){
    		
		    $customer = Yii::$app->request->post();
			
		    if(!$customer['phone']){
			    return json_encode(['status' => false, 'data' => ['message' => 'Вкажіть телефон для зв\'язку!']], JSON_UNESCAPED_UNICODE);
		    }
		    
		    foreach($_SESSION['cart'] as $optionID => $qty){
			    $productOption = ProductOption::findOne($optionID);
			    $cart['products'][$optionID]['data'] = $productOption;
			    $cart['products'][$optionID]['qty'] = $qty;
			    $cart['products'][$optionID]['amount'] = $qty * $productOption->price;
			    $cart['totalAmount'] += $qty * $productOption->price;
		    }
		    
		    unset($_SESSION['cart']);
		    
			Yii::$app->mailer->compose('newOrderToOwner', ['cart' => $cart, 'customer' => $customer])
				->setFrom(['info@2051.kyiv.ua' => '2051. Доставка коктейлів'])
				->setTo('s.sulacov@gmail.com')
				->setSubject('Нове замовлення')
				->send();
		    
		    return json_encode(['status' => true, 'html' => $this->renderAjax('confirmOrder')], JSON_UNESCAPED_UNICODE);
		    
	    }else{
    	    return json_encode(['status' => false, 'data' => ['message' => 'Пусте замовлення. Додайте улюбленні коктейлі та підтвердіть замовлення']], JSON_UNESCAPED_UNICODE);
	    }
    }
}
