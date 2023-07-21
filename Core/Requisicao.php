<?php

namespace Core;

use Symfony\Component\Dotenv\Dotenv;

/**
 * Classe que desmembra a url passada para a chamada dos controles e modulos
 * do sistema
 *
 * @author Jonatas
 */
class Requisicao
{
    public $_urlAtual;
    public $_navLinks;
    private $_modulo;
    private $_Controller;
    private $_metodo;
    private $_argumentos;
    private $_modules;

    private static $instance = null;

    private function __construct()
    {
        $this->parseUrl();
        $this->setControllerAndModule();
        $this->setDefaultControllerAndMethod();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            // Pega a url e ajuda a sanitizar 
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            // Trata possíveis injections deixando apenas algumas pontuações e alfanumericos
            $url = preg_replace('/([^\.\-\_\/a-z0-9]+)/i', '', $url);
            $url = strtolower($url);
            $url = explode('/', $url);
            $this->_navLinks = $url;
            $url = array_filter($url);

            // separa os blocos da url separados por barra
            $this->_urlAtual = implode('/', $url);
            // lista os modulos da pasta modulos para verificação se o modulo passado
            // no url realmente existe dentro da pasta
            foreach (new \DirectoryIterator(RAIZ . "App" . DS . "Modulos") as $Files) {
                if ($Files->isDir() && !$Files->isDot()) {
                    $this->_modules[] = strtolower($Files->getFilename());
                }
            }
        }
    }

    private function setControllerAndModule()
    {
        if (!empty($this->_navLinks)) {
            $this->_modulo = array_shift($this->_navLinks);

            if ($this->_modulo) {
                $this->_Controller = strtolower(array_shift($this->_navLinks) ?? '');

                if (!$this->_Controller) {
                    $this->_Controller = 'index';
                }
            }
        }
    }

    private function setDefaultControllerAndMethod()
    {
        if (!$this->_Controller) {
            $this->_Controller = getenv('CONTROLE_PATRAO');
        }

        if (!$this->_metodo) {
            $this->_metodo = 'index';
        }

        if (!isset($this->_argumentos)) {
            $this->_argumentos = array();
        }
    }

    public function getController()
    {
        return $this->_Controller;
    }

    public function getModulo()
    {
        return $this->_modulo;
    }

    public function getMetodo()
    {
        return $this->_metodo;
    }

    public function getArgs()
    {
        return $this->_argumentos;
    }
}
