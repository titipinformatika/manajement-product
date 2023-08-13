<?php
namespace TitipInformatika\Service\Impl;
use PHPUnit\Framework\TestCase;
use TitipInformatika\Config\Database;
use TitipInformatika\Entity\Product;
use TitipInformatika\Helper\CleanDataBase;
use TitipInformatika\Repository\Impl\ProductRepositoryImpl;
use TitipInformatika\Repository\ProductRepository;
use TitipInformatika\Service\ProductService;
use TitipInformatika\Service\Impl\ProductServiceImpl;

class ProductServiceTest extends TestCase{
    
    private ProductRepository $productRepository;
    private ProductService $productService;
    private Database $database;
     protected function setUp():void
    {
        parent::setUp();
        $this->database = new Database();
        $this->productRepository = new ProductRepositoryImpl($this->database);
        $this->productService = new ProductServiceImpl($this->productRepository);
        
    }

    protected function tearDown():void
    {
        parent::tearDown();
        $clean_db = new CleanDataBase($this->database->getConnection());
        // $clean_db->cleanTable("product");
    }

    function testSaveSuccess(){
        $product = new Product();
        $product->setId("1");
        $product->setName("Macbook Pro M2");
        $product->setDescription("Macbook Chip M2");
        $product->setPrice(20_100_000);
        $product->setQuantity(10);
        $this->productService->save($product);
        self::expectOutputString("Success Menambah Produk : Macbook Pro M2".PHP_EOL);
    }
    
    function testSaveFailed(){
        $product = new Product();
        $product->setId("1");
        $product->setName("Macbook Pro M2");
        $product->setDescription("Macbook Chip M2");
        $product->setPrice(20_100_000);
        $product->setQuantity(10);
        $this->productService->save($product);
        self::expectOutputString("Product already exist".PHP_EOL);

    }

    function testDeleteFailed(){
        $this->productService->delete(10);
        $this->expectOutputString("Product Not Found".PHP_EOL);
        
    }
    
    function testDeleteSuccess(){
        $this->productService->delete("1");
        $this->expectOutputString("Success Deleted Product".PHP_EOL);
    }

    function testShowNotFound(){
        $this->productService->showProduct();
        self::expectOutputString("Product Empty".PHP_EOL);
    }

    function testShowSuccess(){
        $this->productService->showProduct();
        self::expectOutputString("Product Id: 1".PHP_EOL."Product Name: Macbook Pro M2".PHP_EOL);
        self::expectOutputString("Product Name: Macbook Pro M2".PHP_EOL);
        self::expectOutputString("Product Description: Macbook Chip M2".PHP_EOL);
        self::expectOutputString("Price: 20100000".PHP_EOL);
        self::expectOutputString("Product Stok: 10".PHP_EOL);
        // self::expectOutputString("---------------------------------".PHP_EOL);
    }

}