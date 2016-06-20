<div class="container">
    <header>
        <nav class="navbar navbar-default navbar-fixed-top cabecera">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <?php echo $this->tag->linkTo(array('index', '<i class="fa fa-paw fa-2x"></i>adogme', 'class' => 'navbar-brand icon-block', 'id' => 'cabcera-logo')); ?>
                </div>

                <?php echo $this->elements->getMenu(); ?>
            </div>
        </nav>
    </header>
</div>

<div class="container">
    <?php echo $this->getContent(); ?>
</div>