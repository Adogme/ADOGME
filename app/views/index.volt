<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ get_title() }}
        
        {{ stylesheet_link('css/bootstrap.min.css') }}
        {{ stylesheet_link('css/jquery-ui.structure.min.css') }}
        {{ stylesheet_link('css/jquery-ui.theme.min.css') }}
        {{ stylesheet_link('css/estilos.css') }}

        {{ javascript_include('js/jquery.min.js') }}
        {{ javascript_include('js/bootstrap.min.js') }}
        {{ javascript_include('js/jquery-ui.min.js') }}
        
        {#
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jquery-ui.structure.min.css">
        <link rel="stylesheet" href="css/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="css/estilos.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        #}
        <meta name="author" content="kyo">
    </head>
    <body>
        {{ content() }}
    </body>
</html>
