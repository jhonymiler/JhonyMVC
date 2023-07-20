<?php

namespace Core;

use App\{Controllers, Models, Views, Modulos};

// bootstrap
class App
{
    /**
     *  PROCESSA A NOVA REQUISIÇÃO
     *
     * requisição qualquer passada para processamento
     * @param Requisicao $peticion
     */
    public static function init(Requisicao $peticion)
    {


        $modulo = $peticion->getModulo();
        $controller = $peticion->getController() . 'Controller';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();

        if ($modulo) {
            //$rotaModulo = RAIZ . 'App' . DS . 'Controllers' . DS . $modulo . 'Controller.php';
            $rotaModulo = 'App\\Controllers\\' . $modulo . 'Controller';

            if (class_exists($rotaModulo)) {
                $rotaController = 'App\\Modulos\\' . $modulo . '\\Controllers\\' . $controller;
            } else {
                throw new \Exception('Error de base de modulo');
            }
        } else {
            $rotaController = 'App\\Controllers\\' . $controller;
        }

        if (\class_exists($rotaController)) {

            $controller = new $rotaController;

            if (is_callable(array($controller, $metodo))) {
                $metodo = $peticion->getMetodo();
            } else {
                $metodo = 'index';
            }

            if (isset($args)) {
                call_user_func_array(array($controller, $metodo), $args);
            } else {
                call_user_func(array($controller, $metodo));
            }
        }
    }
}
