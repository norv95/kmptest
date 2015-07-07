<?php

class SuppliersFactory
{

    private static $suppliers = array('supplier_a' => 'SupplierA');

    public static function getSupplier($supplierId = 'supplier_a') {
        require 'Suppliers/' . self::$suppliers[$supplierId] . '.php';
        return new self::$suppliers[$supplierId]();
    }
} 