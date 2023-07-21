<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{$titulo}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/public/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/public/css/bootstrap.min.css" rel="stylesheet">
        <link href="/public/css/styles.css" rel="stylesheet" />

    </head>
    <body>
        {include file='menu.tpl'}

        <main class="container">
            
                  <!-- CONTEUDO -->
                {if is_array($_conteudo)}
                    {foreach from=$_conteudo item=conteudo}
                        {include file=$conteudo}
                    {/foreach}
                {else}
                    {include file="home.tpl"}
                {/if}
          </main>
      

        {include file='footer.tpl'}

        <!-- Bootstrap core JS-->
        <script src="/public/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/public/js/scripts.js"></script>
    </body>

</html>
