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

                    <!--<a href="#" class="navbar-brand" id="cabecera-logo">Adogme</a>-->
                    <?php echo $this->tag->linkTo(array('index', 'Adogme', 'class' => 'navbar-brand', 'id' => 'cabcera-logo')); ?>
                </div>

                <div class="collapse navbar-collapse" id="navbar-1">
                    <ul class="nav navbar-nav">
                        <li><?php echo $this->tag->linkTo(array('index', 'Inicio')); ?></li>
                        <li><?php echo $this->tag->linkTo(array('adopcion', 'Adopcion')); ?></li>
                        <li><?php echo $this->tag->linkTo(array('cuenta', 'Cuenta')); ?></li>
                    </ul>

                    <!--<a href="sesion/index" class="nav navbar-nav navbar-right" id="cabecera-login">Iniciar Sesion</a>-->
                    <?php if (!$this->session->get('auth')) { ?>
                        <?php echo $this->tag->linkTo(array('sesion', 'Iniciar Sesion', 'class' => 'nav navbar-nav navbar-right', 'id' => 'cabecera-login')); ?>
                    <?php } else { ?>
                        <?php echo $this->tag->linkTo(array('sesion/logout', 'Cerrar Sesion', 'class' => 'nav navbar-nav navbar-right', 'id' => 'cabecera-login')); ?>
                        <?php echo $this->tag->linkTo(array('cuenta', 'Usuario', 'class' => 'nav navbar-nav navbar-right', 'id' => 'cabecera-login')); ?>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>
</div>

<div class="container">
    <?php echo $this->getContent(); ?>
</div>