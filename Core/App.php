<?php

namespace Core;

use App\{Controllers, Models, Views, Modulos};
use Exception;

class App
{
    public static function init(Requisicao $peticion)
    {
        $modulo = $peticion->getModulo();
        $controller = $peticion->getController() . 'Controller';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();

        if ($modulo) {
            $rotaModulo = 'App\\Controllers\\' . $modulo . 'Controller';

            if (!class_exists($rotaModulo)) {
                throw new Exception('Módulo não encontrado: ' . $modulo);
            }
            $rotaController = 'App\\Modulos\\' . ucfirst($modulo) . '\\Controllers\\' . $controller;
        } else {
            $rotaController = 'App\\Controllers\\' . $controller;
        }

        if (class_exists($rotaController)) {
            $controller = new $rotaController;

            if (is_callable([$controller, $metodo])) {
                $metodo = $peticion->getMetodo();
            } else {
                $metodo = 'index';
            }

            call_user_func_array([$controller, $metodo], $args ?? []);
        }
    }
}
