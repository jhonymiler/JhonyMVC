<?php
/* Smarty version 4.0.3, created on 2022-01-16 16:53:20
  from 'C:\xampp\htdocs\testes\testando\App\Views\painel\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.3',
  'unifunc' => 'content_61e477b045a078_43574173',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0d83208a00af83969453bf4c1ccc4044b1a3787' => 
    array (
      0 => 'C:\\xampp\\htdocs\\testes\\testando\\App\\Views\\painel\\index.tpl',
      1 => 1642362726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home.tpl' => 1,
  ),
),false)) {
function content_61e477b045a078_43574173 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
    </head>

    <body>
        <h1><?php echo $_smarty_tpl->tpl_vars['Teste']->value;?>
</h1>
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

    </body>

</html>
<?php }
}
