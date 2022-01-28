<style>
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
            <form method="post" action="{$_pgParams.RAIZ}login">
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
