<?php echo $this->getContent(); ?>

<br>
<br>
<br>
<br>
<div id="formulario-login" class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
	<div class="panel panel-default">
		<div class="panel-heading">LogIn</div>
		<div class="panel-body">
			<?php echo $this->tag->form(array('sesion/login', 'id' => 'loginForm', 'method' => 'post')); ?>
				<div class="form-group">
					<!--<input type="email" id="email" placeholder="Email" class="form-control">-->
					<?php echo $form->render('email', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->render('password', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $this->tag->linkTo(array('registro', 'Registrarse', 'class' => 'btn btn-primary col-sm-5')); ?>
					<?php echo $this->tag->submitButton(array('Iniciar Sesion', 'class' => 'btn btn-primary col-sm-5 col-sm-offset-2')); ?>
				</div>
			<?php echo $this->tag->endForm(); ?>
		</div>
	</div>
</div>