<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $this->tag->getTitle(); ?>
        
        <?php echo $this->tag->stylesheetLink('css/bootstrap.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/jquery-ui.structure.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('css/jquery-ui.theme.min.css'); ?>
        <?php echo $this->tag->stylesheetLink('https://fonts.googleapis.com/css?family=Signika:700', false); ?>
        <?php echo $this->tag->stylesheetLink('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css', false); ?>
        <?php echo $this->tag->stylesheetLink('css/estilos.css'); ?>


        <?php echo $this->tag->javascriptInclude('js/jquery.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/bootstrap.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/jquery-ui.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/jquery.ui.widget.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/jquery.iframe-transport.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/jquery.fileupload.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/jquery.cloudinary.js'); ?>
        <meta name="author" content="kyo">
    </head>
    <body>
        <?php echo $this->getContent(); ?>
    </body>
</html>
