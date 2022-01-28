<?php

namespace App\Controllers;

use Core\Controller;
use Core\Sessao;

class loginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (Sessao::get('logado') == true) {
            $this->redir('painel');
            exit();
        }

        if ($this->POST('user') && $this->POST('senha')) {
            Sessao::set('logado', true);
            $this->redir('painel');
            exit();
        }
        $this->_view->assign('titulo', 'Login');
        $this->_view->addConteudo('login');
        $this->_view->renderizar();
    }

    public function sair()
    {
        Sessao::set('logado', false);
        $this->redir('login');
    }
}
