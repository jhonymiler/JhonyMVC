<?php

namespace App\Controllers;

use Core\{Controller, Model, Sessao};

/**
 * Description of indexControle
 *
 * @author Jonatas
 */
class userController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->checkAuth()) {
            exit();
        }
        header('Content-Type: application/json; charset=UTF-8');
    }

    public function index()
    {
    }



    public function listaUser()
    {

        $users = array(
            array(
                'id' => 1,
                'name' => 'Diogo'
            ),
            array(
                'id' => 2,
                'name' => 'Kaue'
            ),
            array(
                'id' => 3,
                'name' => 'Hugo'
            ),
            array(
                'id' => 4,
                'name' => 'Matheus'
            ),
            array(
                'id' => 5,
                'name' => 'Jonatas'
            )
        );


        if ($this->checkAuth()) {
            echo json_encode($users, JSON_UNESCAPED_UNICODE);
        }
    }
}
