<?php

namespace App\Controllers;

use Core\Controller;



/**
 * Description of indexControle
 *
 * @author Jonatas
 */
class indexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_view->assign('titulo', 'Sistema MVC');
        $this->_view->addConteudo('home');
        $this->_view->renderizar();
    }
}
