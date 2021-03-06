<?= $this->getContent() ?>

<br>
<br>
<br>
<br>
<div id="formulario-login" class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
	<div class="panel panel-default">
		<div class="panel-heading">LogIn</div>
		<div class="panel-body">
			<?= $this->tag->form(['sesion/login', 'id' => 'loginForm', 'method' => 'post']) ?>
				<div class="form-group">
					<!--<input type="email" id="email" placeholder="Email" class="form-control">-->
					<?= $form->render('email', ['class' => 'form-control']) ?>
				</div>

				<div class="form-group">
					<?= $form->render('password', ['class' => 'form-control']) ?>
				</div>

				<div class="form-group">
					<?= $this->tag->linkTo(['registro', 'Registrarse', 'class' => 'btn btn-primary col-sm-5']) ?>
					<?= $this->tag->submitButton(['Iniciar Sesion', 'class' => 'btn btn-primary col-sm-5 col-sm-offset-2']) ?>
				</div>
			<?= $this->tag->endForm() ?>
		</div>
	</div>
</div>