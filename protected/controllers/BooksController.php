<?php

class BooksController extends Controller
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

	public function actionIndex() {
		$this->render('index');
	}

    /**
     * @param string наименование книги
     * @param string наименование автора
     * @return array книги
     * @soap
     */
    public function getBooks($name, $author) {
        $supplier = SuppliersFactory::getSupplier();
        return $supplier->getBooks(array('name' => $name, 'author' => $author));
    }

    /**
     * @param integer id книги
     * @return array информация о книге
     * @soap
     */
    public function getBookInfo($id) {
        $supplier = SuppliersFactory::getSupplier();
        return $supplier->getBookInfo($id);
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