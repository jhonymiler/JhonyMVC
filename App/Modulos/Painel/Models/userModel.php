<?php

namespace App\Modulos\Painel\Models;

use Core\Model;

class userModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getNome()
    {
        return "Usuário Fulano";
    }
}
