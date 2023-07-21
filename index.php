<?php

require_once './vendor/autoload.php';

use Core\Sessao;
use Core\Requisicao;
use Core\App;

use Symfony\Component\Dotenv\Dotenv;

define('DS', DIRECTORY_SEPARATOR); // para não dar conflito em sistemas que não são windows 
define('RAIZ', realpath(dirname(__FILE__)) . DS); //diretório RAIZ da aplicação

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

try {

    /**
     * Obtem as variáveis de configuração do .ENV
     * e cria variáveis gobais para protegê-las e encurtar a escrita do código.
     */

    $dotenv = new Dotenv();
    $dotenv->load(__DIR__ . '/.env');
    foreach ($_ENV as $k => $v) {
        putenv("$k=$v");
    }

    // Iinica o tratamento da requisicção do URL e armazena num objeto na sessão
    Sessao::init();
    // Roda a aplicação 
    App::init(Requisicao::getInstance());

} catch (Exception $e) {
    throw new Exception($e->getMessage());
}
