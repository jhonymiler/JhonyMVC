<?php

namespace App\Modulos\Painel\Controllers;

use App\Controllers\painelController;
use App\Modulos\Painel\Models\cursoModel;

/**
 * Description of indexControle
 * 
 * @author Jonatas
 */
class indexController extends painelController
{
    public $curso;

    public function __construct()
    {
        parent::__construct();
        $this->curso  = new cursoModel;
    }

    public function index()
    {
        $this->_view->assign('titulo', 'Painel de Administração ');
        $this->_view->addConteudo('dashboard');
        $this->_view->renderizar();
    }
}
