<?php

namespace App\Modulos\Painel\Models;

use Core\Model;

class cursoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        // PDO
        $this->db->query("SELECT * FROM cursos");

    }
}
