<?php

namespace Core;
use Symfony\Component\Dotenv\Dotenv;

/**
 * ferramenta para manipulação das sessões da pagina
 */

class Sessao
{
    /**
     * inicia uma sessão
     */
    public static function init()
    {
        session_start();
        if (!isset($_SESSION)) {
            $_SESSION['id'] = getenv('TIME')();
        }
    }
    /**
     *
     * Seta uma nova sessão ou atualiza uma existente
     */
    public static function set($chave, $valor)
    {
        $_SESSION[$chave] = $valor;
    }

    /**
     *
     * Pega o valor de uma sessão
     *
     */
    public static function get($chave)
    {
        if (isset($_SESSION[$chave])) {
            return $_SESSION[$chave];
        } else {
            return false;
        }
    }



    // DERTERMINA O TEMPO DE ACESSO
    public static function tempo()
    {
        if (!getenv('TIME')) {
            Sessao::addMsg('erro', 'O tempo da sessão não foi definido');
        }
        
        if (getenv('TIME') == 0) {
            return;
        }
        if ($tempo = Sessao::get('tempo')) {

            if (getenv('TIME')() - $tempo > (getenv('TIME') * 60)) {
                Sessao::destroy();
                header('location:' . getenv('BASE_URL') . 'login');
            } else {
                Sessao::set('tempo', getenv('TIME')());
            }
        } else {
            Sessao::set('tempo', getenv('TIME')());
        }
    }

    public static function addMsg($tipo = 'sucesso', $msg = '')
    {
        $status = '';
        switch ($tipo) {
            case 'erro':
                $status = 'bg-danger';
                break;
            case 'sucesso':
                $status = 'bg-success';
                break;
            case 'alerta':
                $status = 'bg-warning';
                break;
            case 'info':
                $status = 'bg-info';
                break;
            default:
                $status = 'bg-info';
                break;
        }

        $_SESSION['msg'][] = array(
            'tipo' => $status,
            'msg' => $msg
        );
    }

    public static function getMsg($limpa = false)
    {
        $msg = isset($_SESSION['msg']) && is_array($_SESSION['msg']) ? $_SESSION['msg'] : array();

        if ($limpa == true) {
            $_SESSION['msg'] = array();
        };

        return $msg;
    }

    /**
     * destroi uma ou todas as sessões
     * se passar a $chave, estão destruirá somente a sessão chamada
     * @param string $chave =  chave de uma sessão
     */
    public static function destroy($chave = false)
    {
        if ($chave == false) {
            session_destroy();
        } else {
            if (is_array($chave)) {
                foreach ($chave as $ch) {
                    unset($_SESSION[$ch]);
                }
            } else {
                unset($_SESSION[$chave]);
            }
        }
    }
}
