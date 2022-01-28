<?php
/* Smarty version 4.0.3, created on 2022-01-27 21:23:03
  from 'C:\xampp\htdocs\sistemas\MVC-Simples-com-Composer\App\Views\painel\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.3',
  'unifunc' => 'content_61f33767b47265_24949065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca5e346535a0f7d6f5eb51ae201089ebeec90778' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sistemas\\MVC-Simples-com-Composer\\App\\Views\\painel\\login.tpl',
      1 => 1643329020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f33767b47265_24949065 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .login-container {
        margin: 5% auto;
    }

    .login-form-1 {
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        margin: 0 auto;
    }

    .login-form-1 h3 {
        text-align: center;
        color: #333;
    }

    .form-group {
        margin: 20px 0;
    }


    .btnSubmit {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }

    .login-form-1 .btnSubmit {
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
    }


    .login-form-1 .ForgetPwd {
        color: #0062cc;
        font-weight: 600;
        text-decoration: none;
    }
</style>

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>Login</h3>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_pgParams']->value['RAIZ'];?>
login">
                <div class="form-group">
                    <input name="user" type="text" class="form-control" placeholder="Usuario" value="" />
                </div>
                <div class="form-group">
                    <input name="senha" type="password" class="form-control" placeholder="Senha" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd">Esqueceu a senha?</a>
                </div>
            </form>
        </div>

    </div>
</div>
<?php }
}
