<?php

class SupplierA implements Supplier {

    public function getBooks($params) {

        if (!is_array($params)) {
            return array('result' => 'fail', 'message' => 'Некорректные параметры запроса getBooks');
        }

        $name = isset($params['name']) ? $params['name'] : '';
        $author = isset($params['author']) ? $params['author'] : '';

        return Books::getBooks($name, $author);
    }

    public function getBookInfo($bookId) {

        if (empty($bookId)) {
            return array('result' => 'fail', 'message' => 'Не задан идентифкатор книги');
        }

        $bookInfo = Books::getBookInfo($bookId);
        if (count($bookInfo) <= 0 ) {
            return array('result' => 'success',
                'message' => 'Книг с указанным идентификатором не найдено');
        }

        $info = array($bookInfo->getAttributes());
        $authors = array();

        foreach($bookInfo->authors as $item) {
            $authors[] = $item->getAttributes();
        }

        $info['authors'] = $authors;

        return $info;
    }

    public function createOrder($bookId, $count) {

        $orderId = Orders::create();

        if ($orderId !== false) {
            OrderBooks::create($orderId, $bookId, $count);
        } else {
            return -1;
        }

        return $orderId;
    }

    public function cancelOrder($orderId) {

        return Orders::cancel($orderId);
    }

    public function proceedOrder($orderId) {

    }
} 