<?php
/* Smarty version 4.0.3, created on 2022-01-27 21:07:35
  from 'C:\xampp\htdocs\sistemas\MVC-Simples-com-Composer\App\Views\painel\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.3',
  'unifunc' => 'content_61f333c7dc02b0_35696581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbc7b0796690f7549e41e061f21cf122a8374dba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sistemas\\MVC-Simples-com-Composer\\App\\Views\\painel\\index.tpl',
      1 => 1643328399,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu.tpl' => 1,
    'file:home.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_61f333c7dc02b0_35696581 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['_pgParams']->value['path_layout'];?>
assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo $_smarty_tpl->tpl_vars['_pgParams']->value['path_layout'];?>
css/styles.css" rel="stylesheet" />
    </head>

    <body>
        <?php $_smarty_tpl->_subTemplateRender('file:menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <!-- CONTEUDO -->
        <?php if (is_array($_smarty_tpl->tpl_vars['_conteudo']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_conteudo']->value, 'conteudo');
$_smarty_tpl->tpl_vars['conteudo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['conteudo']->value) {
$_smarty_tpl->tpl_vars['conteudo']->do_else = false;
?>
                <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['conteudo']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
            <?php $_smarty_tpl->_subTemplateRender("file:home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>

        <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <!-- Bootstrap core JS-->
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
        <!-- Core theme JS-->
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_pgParams']->value['path_layout'];?>
js/scripts.js"><?php echo '</script'; ?>
>
    </body>

</html>
<?php }
}
