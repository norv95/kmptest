<?php

class SoapClientController extends Controller
{
    private $baseUrl;

    function __construct() {
        parent::__construct('SoapClient');
        $this->baseUrl = YII::app()->getBaseUrl(true);
    }

	public function actionIndex() {
		$this->render('index');
	}

    public function actionGetBooks() {
        $name = Yii::app()->request->getPost('name');
        $author = Yii::app()->request->getPost('author');
        $client=new SoapClient($this->baseUrl . '/index.php/books/quote');
        $booksList = $client->getBooks($author, $name);

        $this->render('books', array('books' => $booksList));

    }

    public function actionGetBookInfo() {

        $bookId = Yii::app()->request->getParam('book_id');

        $client = new SoapClient($this->baseUrl . '/index.php/books/quote');
        $bookInfo = $client->getBookInfo($bookId);

        $this->render('book', array('info' => $bookInfo));
    }

    public function actionCreateOrder() {

        $bookId = Yii::app()->request->getParam('book_id');
        $count = Yii::app()->request->getParam('count');

        $bookInfo = '';

        if (!empty($bookId) && !empty($count)) {
            $client = new SoapClient($this->baseUrl . '/index.php/orders/quote');
            $bookInfo = $client->createOrder($bookId, $count);
        }

        $this->render('order_create', array('info' => $bookInfo));
    }

    public function actionCancelOrder() {

        $orderId = Yii::app()->request->getParam('order_id');

        if (!empty($orderId)) {
            $client = new SoapClient($this->baseUrl . '/index.php/orders/quote');
            $result = $client->cancelOrder($orderId);

            if ($result == true) {
                $info = 'Заказ № ' . $orderId . ' отменён';
            } else {
                $info = 'Невозможно отменить заказ № ' . $orderId;
            }
        }

        $this->render('order_cancel', array('info' => $info));
    }

	// -----------------------------------------------------------
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}