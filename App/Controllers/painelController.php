<?php

namespace App\Controllers;

use Core\{Controller, Model, Sessao};

/**
 * Description of indexControle
 *
 * @author Jonatas
 */
class painelController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!Sessao::get('logado')) {
            $this->redir('login');
            exit();
        }
    }

    public function index()
    {
    }
}
