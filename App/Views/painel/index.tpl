<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{$titulo}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{$_pgParams.path_layout}assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{$_pgParams.path_layout}css/styles.css" rel="stylesheet" />
    </head>

    <body>
        {include file='menu.tpl'}

        <!-- CONTEUDO -->
        {if is_array($_conteudo)}
            {foreach from=$_conteudo item=conteudo}
                {include file=$conteudo}
            {/foreach}
        {else}
            {include file="home.tpl"}
        {/if}

        {include file='footer.tpl'}

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{$_pgParams.path_layout}js/scripts.js"></script>
    </body>

</html>
