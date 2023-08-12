<?php

namespace TitipInformatika\Repository\Impl;

use PDO;
use TitipInformatika\Config\Database;
use TitipInformatika\Entity\Product;

class ProductRepositoryImpl implements \TitipInformatika\Repository\ProductRepository{
    private ?PDO $connection;
    public function __construct(Database $database){
        $this->connection = $database->getConnection();
    }

    public function save(Product $product):Product{
        $sql = "INSERT INTO product (id,name,description,price,quantity) VALUES (?,?,?,?,?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$product->getId(),$product->getName(),$product->getDescription(),$product->getPrice(),$product->getQuantity()]);
        return $product;
    }

    public function delete(string $id ):bool{
       if($this->findById($id) != null){
            $sql = "DELETE FROM product WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);
            return true;
       }
       return false;

    }

    public function findById(string $id):?Product{

        $sql = "SELECT * FROM product WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
        
        $result = $statement->fetch();
        if($result){
            $product = new Product();
            $product->setId($result['id']);
            $product->setName($result['name']);
            $product->setDescription($result['description']);
            $product->setPrice($result['price']);
            $product->setQuantity($result['quantity']);
            return $product;
        }
        return null;

    }

    public function findAll():array{
        $result=[];
        $query = "SELECT * FROM product";
        $statemnt = $this->connection->query($query);
        while($row = $statemnt->fetch()){
            $product = new Product();
            $product->setId($row['id']);
            $product->setName($row['name']);
            $product->setDescription($row['description']);
            $product->setPrice($row['price']);
            $product->setQuantity($row['quantity']);
            array_push($result,$product);
        }
      return $result;
    }



    public function __destruct(){
        $this->connection =null;
    }

}