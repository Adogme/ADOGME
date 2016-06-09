<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $this->tag->getTitle() ?>
        
        <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
        <?= $this->tag->stylesheetLink('css/jquery-ui.structure.min.css') ?>
        <?= $this->tag->stylesheetLink('css/jquery-ui.theme.min.css') ?>
        <?= $this->tag->stylesheetLink('https://fonts.googleapis.com/css?family=Signika:700', false) ?>
        <?= $this->tag->stylesheetLink('css/estilos.css') ?>


        <?= $this->tag->javascriptInclude('js/jquery.min.js') ?>
        <?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
        <?= $this->tag->javascriptInclude('js/jquery-ui.min.js') ?>
        <meta name="author" content="kyo">
    </head>
    <body>
        <?= $this->getContent() ?>
    </body>
</html>
