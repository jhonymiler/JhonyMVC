<?php

namespace App\Controllers;

use Core\Controller;
use Core\Sessao;

class loginController extends Controller
{
    private  $key; //Application Key

    public function __construct()
    {
        parent::__construct();
        $this->key = '123456';
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

        print_r($_REQUEST);
        exit();
        if ($this->POST('username') == 'omega' && $this->POST('senha') == 'omega') {
            //Header Token
            $header = [
                'typ' => 'JWT',
                'alg' => 'HS256'
            ];

            //Payload - Content
            $payload = [
                'name' => 'Rafael Capoani',
                'username' => $_POST['username'],
            ];

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

            echo json_encode(array('data' => $token, 'status' => 'sucess'));
        } else {
            echo json_encode(array('data' => 'Operação Inválida', 'status' => 'error'));
        }
    }

    public  function checkAuth()
    {
        $http_header = apache_request_headers();

        if (isset($http_header['Authorization']) && $http_header['Authorization'] != null) {
            $bearer = explode(' ', $http_header['Authorization']);
            //$bearer[0] = 'bearer';
            //$bearer[1] = 'token jwt';

            $token = explode('.', $bearer[1]);
            $header = $token[0];
            $payload = $token[1];
            $sign = $token[2];

            //Conferir Assinatura
            $valid = hash_hmac('sha256', $header . "." . $payload, $this->key, true);
            $valid = $this->base64UrlEncode($valid);

            if ($sign === $valid) {
                return true;
            }
        }

        return false;
    }


    /*Criei os dois métodos abaixo, pois o jwt.io agora recomenda o uso do 'base64url_encode' no lugar do 'base64_encode'*/
    private  function base64UrlEncode($data)
    {
        // First of all you should encode $data to Base64 string
        $b64 = base64_encode($data);

        // Make sure you get a valid result, otherwise, return FALSE, as the base64_encode() function do
        if ($b64 === false) {
            return false;
        }

        // Convert Base64 to Base64URL by replacing “+” with “-” and “/” with “_”
        $url = strtr($b64, '+/', '-_');

        // Remove padding character from the end of line and return the Base64URL result
        return rtrim($url, '=');
    }

    public function sair()
    {
        Sessao::set('logado', false);
        $this->redir('login');
    }
}
