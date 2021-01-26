<?php

namespace MVC\core;
use PDO;
use PDOException;

class model 
{
    private $server = "mysql:host=localhost;dbname=school";
    private $user   = USER;
    private $pass   = PASS;
    private $option = [ PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ];
    public $conn;
    // connection with DB
    public function __construct()
    {
        try{
            $this->conn = new PDO($this->server,$this->user,$this->pass,$this->option);

        }catch(PDOException $e){
            echo "Connection Faild".$e->getMessage();
                    }
    }
    //method return data
    // public function getData()
    // {
    //     $stmt = $this->conn->prepare("SELECT * FROM `tbl_student` ");
    //     $stmt ->execute();
    //     $rows = $stmt->fetchAll(2);
    //     return $rows;
    // }
}