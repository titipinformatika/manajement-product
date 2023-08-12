<?php
namespace  TitipInformatika\Service;
use Entity\Product;

interface ProductService{

    public function save(Product $product):void;

    public function delete(string $id):void;

    public function edit(Product $product):void;

    public function showProduct():array;

    public function findById(string $id):void;
}