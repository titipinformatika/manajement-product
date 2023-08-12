<?php
namespace TitipInformatika\Config;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase {

    public function testGetConnection(){
        $connection = new Database();
        $connection->getConnection();
    }
}