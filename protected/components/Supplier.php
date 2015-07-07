<?php

interface Supplier {

    public function getBooks($params) ;
    public function getBookInfo($bookId);
    public function createOrder($bookId, $count);
    public function cancelOrder($orderId);
    public function proceedOrder($orderId);
} 