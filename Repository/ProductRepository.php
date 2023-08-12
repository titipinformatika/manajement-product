<?php

namespace TitipInformatika\Repository;
use TitipInformatika\Entity\Product;

interface ProductRepository{

    public function save(Product $product):Product;

    public function delete(string $id):bool;

    public function findById(string $id):?Product;

    public function findAll():array;

}