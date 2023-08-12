<?php
namespace TitipInformatika\Repository\Impl;

use PHPUnit\Framework\TestCase;
use TitipInformatika\Config\Database;
use TitipInformatika\Entity\Product;
use TitipInformatika\Helper\CleanDataBase;

class ProductRepositoryTest extends TestCase{
    private \TitipInformatika\Repository\ProductRepository $productRepository;
    private CleanDataBase $db_clean;
    public function setUp():void{
        $db = new Database();
        $this->db_clean = new CleanDataBase($db->getConnection());
        $this->productRepository = new ProductRepositoryImpl($db);
    }

    public function tearDown():void{
        $this->db_clean->cleanTable("product");
    }

    function testSuccessSave(){
        $product = new Product();
        $product->setId("2");
        $product->setName("Macbook Pro M2");
        $product->setDescription("Macbook Pro M2 dengan chip terbaru");
        $product->setPrice(19_000_000);
        $product->setQuantity(90);
        $result = $this->productRepository->save($product);
        self::assertSame($product,$result);
    }

    function testDeleteSuccess(){
        $product = new Product();
        $product->setId("2");
        $product->setName("Macbook Pro M2");
        $product->setDescription("Macbook Pro M2 dengan chip terbaru");
        $product->setPrice(19_000_000);
        $product->setQuantity(90);
        $result = $this->productRepository->save($product);
        $result= $this->productRepository->delete("2");
       self::assertTrue($result,"Success Deleted");
    }

    function testDeleteFailed(){
        $result =$this->productRepository->delete("2");
        self::assertFalse($result,"Gagal Deleted Record");
    }

    function testFindByIdSuccess(){
        $product = new Product();
        $product->setId("3");
        $product->setName("Macbook Pro M2");
        $product->setDescription("Macbook Pro M2 dengan chip terbaru");
        $product->setPrice(19_000_000);
        $product->setQuantity(90);
        $result = $this->productRepository->save($product);

        $this->assertEquals($product,$this->productRepository->findById("3"));

    }

    function testFindByIdFailed(){
        $result = $this->productRepository->findById("3");
        self::assertNull($result,"Not Found");
    }

    // test find all

    function testFindAll(){
        $product = new Product();
        $product->setId("4");
        $product->setName("Macbook Pro M2");
        $product->setDescription("Macbook Pro M2 dengan chip terbaru");
        $product->setPrice(19_000_000);
        $product->setQuantity(90);
        $this->productRepository->save($product);
        // $this->productRepository->save($product2);

        $result = $this->productRepository->findAll();
        foreach($result as $value){
            self::assertEquals($product->getId(),$value->getId());
            self::assertEquals($product->getName(),$value->getName());
            self::assertEquals($product->getDescription(),$value->getDescription());
            self::assertEquals($product->getPrice(),$value->getPrice());
            self::assertEquals($product->getQuantity(),$value->getQuantity());
        }

    }

    
}