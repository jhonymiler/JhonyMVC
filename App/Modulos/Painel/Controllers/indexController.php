<?php

namespace App\Modulos\Painel\Controllers;

use App\Controllers\painelController;
use App\Modulos\Painel\Models\userModel;

/**
 * Description of indexControle
 * 
 * @author Jonatas
 */
class indexController extends painelController
{
    public $user;

    public function __construct()
    {
        parent::__construct();
        $this->user  = new userModel;
    }

    public function index()
    {
        $this->_view->assign('titulo', 'Painel de Administração {' . $this->user->getNome() . '}');
        $this->_view->addConteudo('dashboard');
        $this->_view->renderizar();
    }
}
