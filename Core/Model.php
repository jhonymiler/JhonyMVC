<?php

namespace Core;

abstract class Model
{
    public $db;

    public function __construct()
    {
        $db = new Database();
        $this->db = $db->con;
    }
}
