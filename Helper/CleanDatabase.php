<?php
namespace TitipInformatika\Helper;
use PDO;
use TitipInformatika\Config\Database;
class CleanDataBase{

    

    public function __construct(private ?PDO $connection){
    }

    public function cleanTable(string $table):void{
        $sql = "truncate $table";
        $this->connection->exec($sql);
    }

    public function __destruct(){
        $this->connection=null;
    }
}
