<?php
/* Smarty version 4.0.3, created on 2022-01-27 20:45:50
  from 'C:\xampp\htdocs\sistemas\MVC-Simples-com-Composer\App\Views\painel\siteMenu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.3',
  'unifunc' => 'content_61f32eae662e17_88981380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfb881980b13f859b0058787fd66bb306c55879f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sistemas\\MVC-Simples-com-Composer\\App\\Views\\painel\\siteMenu.tpl',
      1 => 1643326824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f32eae662e17_88981380 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="#!"><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Sobre</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contato</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Serviços</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php }
}
