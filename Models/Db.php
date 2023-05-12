<?php

namespace Models;

use PDO;
use PDOException;

class Db extends PDO
{
    static private $_instance;
    public $conn;
    public function __construct()
    {
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->conn = new PDO(
                "mysql:host=localhost;
                dbname=survey_service",
                'root',
                '',
                $options
            );
        } catch (\PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    static public function getInstance(){
        if(self::$_instance instanceof self){
            return self::$_instance;
        }
        return self::$_instance = new self;
    }

    static public function getConnection(): PDO
    {
        return self::getInstance()->conn;
    }
}


