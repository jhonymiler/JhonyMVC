<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="#!">{$titulo}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">


                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{$_pgParams.RAIZ}">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#!">Sobre</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contato</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Serviços</a></li>

                {if $smarty.session.logado == true}
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{$_pgParams.RAIZ}painel">[ Painel</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{$_pgParams.RAIZ}login/sair">Sair ]</a></li>
                {else}
                    <li class="nav-item"><a class="nav-link" href="{$_pgParams.RAIZ}login">Entrar</a></li>
                {/if}


            </ul>
        </div>
    </div>
</nav>
