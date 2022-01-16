<?php

namespace Core;

use Core\View;

abstract class Controller
{
    protected $_view;
    protected $_request;


    public function __construct()
    {
        $this->_request = Sessao::get('Requisicao');
        $this->_view = new View();
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
            header('location:' . BASE_URL);
            exit();
        } else {
            header('location:' . BASE_URL . $path);
            exit();
        }
    }
}
