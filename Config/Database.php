<?php

namespace TitipInformatika\Config;
use PDO;
use PDOException;

class Database {
    private string $host="localhost",$port="33061",$user="root",$password="1234",$db="product_management_test";

    public function getConnection(string $mode="test"){
        if($mode != "test"){

            $this->db = "product_management_test";
        }
        try{
            $connection = new PDO("mysql:host={$this->host}:{$this->port}; dbname={$this->db}",$this->user,$this->password);
            return $connection;
    
        }catch(PDOException $erro){
            echo "Error: ".$erro->getMessage();
        }
    }
}

