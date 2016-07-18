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
        {{ stylesheet_link('https://fonts.googleapis.com/css?family=Signika:700',false) }}
        {{ stylesheet_link('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css',false) }}
        {{ stylesheet_link('css/estilos.css') }}


        {{ javascript_include('js/jquery.min.js') }}
        {{ javascript_include('js/bootstrap.min.js') }}
        {{ javascript_include('js/jquery-ui.min.js') }}
        {{ javascript_include('js/jquery.ui.widget.js') }}
        {{ javascript_include('js/jquery.iframe-transport.js') }}
        {{ javascript_include('js/jquery.fileupload.js') }}
        {{ javascript_include('js/jquery.cloudinary.js') }}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js"></script>
        <meta name="author" content="kyo">
    </head>
    <body>
        {{ content() }}
    </body>
</html>
