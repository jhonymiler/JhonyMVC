<?php

namespace Core;

use Smarty;

class View extends Smarty
{
    private $_request;
    private $_js;
    private $_paths;
    private $_jsPlugin;
    private $_template;
    private $_itemMenu;
    public $_pgParams;
    private $_navLinks;
    private $_conteudo = array();
    public $_msg = array();



    public function __construct()
    {
        parent::__construct();
        $this->_request   = Requisicao::getInstance();
        $this->_js        = array();
        $this->_paths     = array();
        $this->_jsPlugin  = array();
        $this->_itemMenu  = '';
        // determina o cache
        $this->caching = false;
        $this->setTemplate(getenv('DEFAULT_LAYOUT'));
    }

    public function getPath($chave)
    {
        return $this->_paths[$chave];
    }

    public function setTemplate($temp)
    {
        // DETERMINA OS CAMINHOS DO LAYOUT
        // seta as configurações do SMARTY
        $this->_template  = $temp;

        $this->_paths['template'] = RAIZ . 'App' . DS . 'Views' . DS .  $this->_template . DS;
        $this->template_dir = $this->_paths['template'];
        $this->config_dir   = RAIZ . 'App' . DS . 'Views' . DS .  $this->_template . DS . 'configs' . DS;
        $this->cache_dir    = RAIZ . 'tmp' . DS . 'cache' . DS;
        $this->compile_dir  = RAIZ . 'tmp' . DS . 'template' . DS;
        $this->debugging = false;


        if ($this->_request->getModulo()) {
            $this->_paths['view'] = RAIZ . 'App' . DS . 'Modulos' . DS . ucfirst($this->_request->getModulo()) . DS . 'Views' . DS;
        } else {
            $this->_paths['view'] = $this->_paths['template'];
        }
        $this->_paths['js']   = getenv('BASE_URL') . 'App' . DS . 'Views' . DS . $this->_template . DS;

        $this->_pgParams = array(
            'path_layout'  => getenv('BASE_URL') . 'App' . DS . 'Views/' . getenv('DEFAULT_LAYOUT') . '/',
            'path_css'     => getenv('BASE_URL') . 'App' . DS . 'Views/' . getenv('DEFAULT_LAYOUT') . '/css/',
            'path_img'     => getenv('BASE_URL') . 'App' . DS . 'Views/' . getenv('DEFAULT_LAYOUT') . '/images/',
            'path_js'      => getenv('BASE_URL') . 'App' . DS . 'Views/' . getenv('DEFAULT_LAYOUT') . '/js/',
            'js'           => $this->_js,
            'js_plugin'    => $this->_jsPlugin,
            'RAIZ'         => getenv('BASE_URL'),
            'REAL_PATH'    => RAIZ
        );

        $this->assign('_pgParams', $this->_pgParams);
    }


    public function addNavLink($url, $nome)
    {
        $this->_navLinks[] = array('url' => $url, 'nome' => $nome);
    }

    public function addConteudo()
    {
        $args = func_get_args();

        if (func_num_args() == 1) {
            $template = $this->_paths['view'] . $args[0] . '.tpl';
        }
        if (func_num_args() >= 2) {
            $template = $template = $this->_paths['view'] . $args[0] . DS . $args[1] . '.tpl';
        }
        // verifica se o caminh é válido
        if (!is_readable($template)) {
            $temp = $this->_paths['template'] . 'index.tpl';
        } else {
            $temp =  $template;
        }

        $this->_conteudo[] = $temp;
    }

    public function renderizar()
    {
        $this->assign('navLinks', $this->_navLinks);
        $this->assign('_conteudo', $this->_conteudo);
        $this->display($this->_paths['template'] . 'index.tpl');
    }

    public function addJs($js)
    {
        if (is_array($js)) {
            foreach ($js as $k => $script) {
                $this->_js[] = $script;
            }
        } elseif (is_string($js)) {
            $this->_js[] = $js;
        } else {
            throw new \Exception('Erro ao carregar o Js: ');
        }
    }

    public function getJs()
    {
        return $this->_js;
    }

    public function addCss($css)
    {
        if (is_array($css)) {
            foreach ($css as $k => $script) {
                array_push($this->_css, getenv('BASE_URL') . 'App' . DS . 'Views/' . $this->_Controller . '/css/' . $script . '.css');
            }
        } elseif (is_string($css)) {
            array_push($this->_css, getenv('BASE_URL') . 'App' . DS . 'Views/' . $this->_Controller . '/css/' . $css . '.css');
        } else {
            throw new \Exception('Erro ao carregar o CSS: ');
        }
    }
}
