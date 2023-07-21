<?php

namespace Core;

class Database
{
    public $con;

    public function __construct()
    {
        /**
         * Quando construir seu banco de dados, descomente o código abaixo
         */

        try {
            $this->con = new \PDO('mysql:host=' . getenv('MYSQL_HOST') . ';dbname=' . getenv('MYSQL_DB'), getenv('MYSQL_USER'), getenv('MYSQL_SENHA'));
            $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}
