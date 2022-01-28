<?php

require_once './vendor/autoload.php';

use Core\{Sessao, Requisicao, App};
use Symfony\Component\Dotenv\Dotenv;

define('DS', DIRECTORY_SEPARATOR); // para não dar conflito em sistemas que não são windows 
define('RAIZ', realpath(dirname(__FILE__)) . DS); //diretório RAIZ da aplicação
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/sistemas/MVC-Simples-com-Composer/'); // url para postagens

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

try {

    /**
     * Obtem as variáveis de configuração do .ENV
     * e cria variáveis gobais para protegê-las e encurtar a escrita do código.
     */

    $dotenv = new Dotenv();
    $dotenv->load(__DIR__ . '/.ENV');
    foreach ($_ENV as $k => $v) {
        define($k, $v);
    }

    // Iinica o tratamento da requisicção do URL e armazena num objeto na sessão
    Sessao::init();
    Sessao::set('Requisicao', new Requisicao);
    // Roda a aplicação 
    App::init(Sessao::get('Requisicao'));
} catch (Exception $e) {
    echo $e->getMessage();
}
