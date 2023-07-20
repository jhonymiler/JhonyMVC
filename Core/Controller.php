<?php

namespace Core;

use Core\View;

abstract class Controller
{
    protected $_view;
    protected $_request;
    protected  $key; //Application Key


    public function __construct()
    {
        $this->_request = Sessao::get('Requisicao');
        $this->_view = new View();
        $this->key = '123456';
    }

    abstract public function index();


    // PEGA UM TEXTO EM UM POST E TRATA
    protected function POST($clave = false)
    {
        if (count($_POST)) {
            if ($clave == false) {
                return $this->parsePost($_POST);
            } else {
                if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
                    $_POST[$clave] = $this->parsePost($_POST[$clave]);
                    return $_POST[$clave];
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    private function parsePost($campos)
    {
        if (is_array($campos)) {
            foreach ($campos as $key => $value) {
                $campos[$key] = $this->parsePost($campos[$key], ENT_QUOTES);
            }
        } else {
            $campos = strip_tags($campos);

            if (!addslashes($campos)) {
                $campos = mysqli_real_escape_string(mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME), $campos);
            }
            return trim($campos);
        }
        //print_r($campos);
        return $campos;
    }
    //PEGA UM POST E VALIDA SE É REALMENTE UM NUMERO INTEIRO
    protected function GET($chave)
    {
        if (!empty($_POST[$chave])) {
            $_POST[$chave] = filter_input(INPUT_POST, $chave, FILTER_VALIDATE_INT);
            return $_POST[$chave];
        }
    }
    //REDIRECIONA A PAGINA
    protected function redir($path = false)
    {

        if ($path == false) {
            header('location:' . getenv('BASE_URL'));
            exit();
        } else {
            header('location:' . getenv('BASE_URL') . $path);
            exit();
        }
    }

    /**
     * função de encriptação para gerar o toquem que vai ser venviado por email
     *
     * @param [String] $str
     *
     * @return String
     */
    protected function encript($str)
    {
        $e = '';
        $q = strlen($str);
        for ($i = 0; $i < $q; $i++) {
            $e .= chr(ceil($q / 57 / 5) ^ ord($str[$i]));
        }
        return strtoupper(implode(unpack("H*", $e)));
    }


    /**
     * função de decriptação, será usado para descriptografar o token enviado por email
     *
     * @param [String] $str
     *
     * @return String
     */
    protected function decript($str)
    {
        $e = '';
        if (ctype_xdigit($str)) {
            $str = pack("H*", $str);
            $q = strlen($str);
            for ($i = 0; $i < $q; $i++) {
                $e .= chr(ceil($q / 57 / 5) ^ ord($str[$i]));
            }
            return $e;
        } else {
            Sessao::addMsg('erro', 'Este Token não existe.');
            return false;
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
    protected  function base64UrlEncode($data)
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
}
