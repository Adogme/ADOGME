<?php echo $this->getContent(); ?>

<h1>Edición de Mascota</h1>
<br>
<div id="formulario-registro-usuario" class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Editar Mascota</div>
		<div class="panel-body">
			<?php echo $this->tag->form(array('cuenta/editarMascota', 'id' => 'editarMascotaForm', 'method' => 'post')); ?>
				<div class="form-group">
					<?php echo $form->render('nombre', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->render('raza', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group form-inline">
					<?php echo $form->render('peso', array('class' => 'form-control')); ?>
					<?php echo $form->render('altura', array('class' => 'form-control')); ?>
					<?php echo $form->render('edad', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->render('descripcion', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group form-inline">
					<?php echo $form->label('small'); ?> <?php echo $form->render('small', array('class' => 'form-control')); ?>
					<?php echo $form->label('medium'); ?> <?php echo $form->render('medium', array('class' => 'form-control')); ?>
					<?php echo $form->label('large'); ?> <?php echo $form->render('large', array('class' => 'form-control')); ?>
					<?php echo $form->label('vacuna'); ?> <?php echo $form->render('vacuna', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $this->tag->submitButton(array('Guardar', 'class' => 'btn btn-primary col-md-4 col-md-offset-4')); ?>
				</div>
			<?php echo $this->tag->endForm(); ?>
		</div>
	</div>
</div>