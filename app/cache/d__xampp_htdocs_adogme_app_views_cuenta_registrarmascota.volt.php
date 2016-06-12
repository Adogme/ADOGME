<?= $this->getContent() ?>

<h1>Registro de Mascota</h1>
<br>
<div id="formulario-registro-usuario" class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Registro de Mascota</div>
		<div class="panel-body">
			<?= $this->tag->form(['cuenta/registrarMascota', 'id' => 'registroMascotaForm', 'method' => 'post']) ?>
				<div class="form-group">
					<?= $form->render('nombre', ['class' => 'form-control']) ?>
				</div>

				<div class="form-group">
					<?= $form->render('raza', ['class' => 'form-control']) ?>
				</div>

				<div class="form-group form-inline">
					<?= $form->render('peso', ['class' => 'form-control']) ?>
					<?= $form->render('altura', ['class' => 'form-control']) ?>
					<?= $form->render('edad', ['class' => 'form-control']) ?>
				</div>

				<div class="form-group">
					<?= $form->render('descripcion', ['class' => 'form-control']) ?>
				</div>

				<div class="form-group form-inline">
					<?= $form->label('small') ?> <?= $form->render('small', ['class' => 'form-control']) ?>
					<?= $form->label('medium') ?> <?= $form->render('medium', ['class' => 'form-control']) ?>
					<?= $form->label('large') ?> <?= $form->render('large', ['class' => 'form-control']) ?>
					<?= $form->label('vacuna') ?> <?= $form->render('vacuna', ['class' => 'form-control']) ?>
				</div>

				<div class="form-group">
					<?= $this->tag->submitButton(['Guardar', 'class' => 'btn btn-primary col-md-4 col-md-offset-4']) ?>
				</div>
			<?= $this->tag->endForm() ?>
		</div>
	</div>
</div>