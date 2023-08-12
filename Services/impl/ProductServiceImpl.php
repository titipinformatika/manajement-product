<?php
namespace TitipInformatika\Sevice\Impl;
use TitipInformatika\Service\ProductService;
use TitipInformatika\Entity\Product;
use TitipInformatika\Repository\ProductRepository;
class ProductServiceImpl implements ProductService{
    
    public function __construct(private ProductRepository $productRepository){
    }

    public function save(Product $product):void{
        $result=$this->productRepository->save($product);
        echo "Success Menambah Produk : {$result->getName()}";
    }

    public function delete(string $id ):void{

        if($this->productRepository->findById($id) !=null){
            $result=$this->productRepository->delete($id);
            if($result){
                echo "Success Deleted Product";
            }else{
                echo "Failed Deleted Product";
            }
        }else{
                echo "Product Not Found";
        }

    }

    public function findById(string $id):void{

        $result = $this->productRepository->findById($id);
        if($result != null){
            echo "Product Id: ".$result->getId().PHP_EOL;
            echo "Product Name: ".$result->getName().PHP_EOL;
            echo "Product Description: ".$result->getDescription().PHP_EOL;
            echo "Price: ".$result->getPrice().PHP_EOL;
            echo "Product Stok: ".$result->getQuantity().PHP_EOL;
        }else{
            echo "Product Not Found".PHP_EOL;
        }

    }

    public function showProduct():void{
        $result=$this->productRepository->findAll();
        if(sizeof($result) >0){
            foreach($result as $value){
            echo "Product Id: ".$value->getId().PHP_EOL;
            echo "Product Name: ".$value->getName().PHP_EOL;
            echo "Product Description: ".$value->getDescription().PHP_EOL;
            echo "Price: ".$value->getPrice().PHP_EOL;
            echo "Product Stok: ".$value->getQuantity().PHP_EOL;
            echo "---------------------------------".PHP_EOL;
            }
        }else{
            echo "Product Empty".PHP_EOL;
        }
    }

    public function edit(Product $product):void{

    }

    
}