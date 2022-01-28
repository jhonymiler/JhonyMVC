<?php
/* Smarty version 4.0.3, created on 2022-01-27 21:24:58
  from 'C:\xampp\htdocs\sistemas\MVC-Simples-com-Composer\App\Views\painel\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.3',
  'unifunc' => 'content_61f337da263cc0_67710746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82d11c21825d36200dd48c49ae85de47f38e18c2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sistemas\\MVC-Simples-com-Composer\\App\\Views\\painel\\menu.tpl',
      1 => 1643329496,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f337da263cc0_67710746 (Smarty_Internal_Template $_smarty_tpl) {
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


                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo $_smarty_tpl->tpl_vars['_pgParams']->value['RAIZ'];?>
">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#!">Sobre</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contato</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Serviços</a></li>

                <?php if ($_SESSION['logado'] == true) {?>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo $_smarty_tpl->tpl_vars['_pgParams']->value['RAIZ'];?>
painel">[ Painel</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['_pgParams']->value['RAIZ'];?>
login/sair">Sair ]</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['_pgParams']->value['RAIZ'];?>
login">Entrar</a></li>
                <?php }?>


            </ul>
        </div>
    </div>
</nav>
<?php }
}
