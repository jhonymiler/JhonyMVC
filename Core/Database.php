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

        /*try {
            $this->con = new \PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_BD, MYSQL_USER, MYSQL_SENHA);
            $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }*/
    }
}
