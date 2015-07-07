<?php

class OrdersController extends Controller
{
    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'quote'=>array(
                'class'=>'CWebServiceAction'
            ),
        );
    }

	public function actionIndex()
	{
		$this->render('index');
	}

    /**
     * @param int идентификатор книги
     * @param int количество книг
     * @return int номер заказа
     * @soap
     */
    public function createOrder($bookId, $count) {

        $supplier = SuppliersFactory::getSupplier();
        return $supplier->createOrder($bookId, $count);

    }

    /**
     * @param int идентификатор заказа
     * @return boolean номер заказа
     * @soap
     */
    public function cancelOrder($orderId) {

        $supplier = SuppliersFactory::getSupplier();
        return $supplier->cancelOrder($orderId);
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

	*/
}