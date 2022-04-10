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

    // public function index()
    // {
    //     if (Sessao::get('logado') == true) {
    //         $this->redir('painel');
    //         exit();
    //     }

    //     if ($this->POST('user') && $this->POST('senha')) {
    //         Sessao::set('logado', true);
    //         $this->redir('painel');
    //         exit();
    //     }
    //     $this->_view->assign('titulo', 'Login');
    //     $this->_view->addConteudo('login');
    //     $this->_view->renderizar();
    // }


    public function index()
    {

        header('Content-Type: application/json; charset=UTF-8');

        $_POST = json_decode(file_get_contents("php://input"), true);
        if ($this->POST('username') == 'omega' && $this->POST('senha') == 'omega') {
            //Header Token
            $header = [
                'typ' => 'JWT',
                'alg' => 'HS256'
            ];

            //Payload - Content
            $payload = [
                'id' => 1,
                'name' => 'Rafael Capoani',
                'username' => $_POST['username'],
            ];

            $user = $payload;

            //JSON
            $header = json_encode($header);
            $payload = json_encode($payload);

            //Base 64
            $header = $this->base64UrlEncode($header);
            $payload = $this->base64UrlEncode($payload);

            //Sign
            $sign = hash_hmac('sha256', $header . "." . $payload, $this->key, true);
            $sign = $this->base64UrlEncode($sign);

            //Token
            $token = $header . '.' . $payload . '.' . $sign;

            echo json_encode(array('token' => $token, 'user' => $user, 'status' => 'sucess'), JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array('status' => 'error'), JSON_UNESCAPED_UNICODE);
        }
    }


    public function sair()
    {
        Sessao::set('logado', false);
        $this->redir('login');
    }
}
