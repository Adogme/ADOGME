
<?php echo $this->getContent(); ?>

<br>
<br>
<div id="formulario-registro-usuario" class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Registro de Usuario</div>
		<div class="panel-body">
			<?php echo $this->tag->form(array('registro', 'id' => 'registroForm', 'method' => 'post')); ?>
				<div class="form-group form-inline">
					<?php echo $form->render('nombre', array('class' => 'form-control')); ?>
					<?php echo $form->render('apellido', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->render('email', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->render('password', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->render('repeatPassword', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group form-inline">
					<?php echo $form->render('telefono', array('class' => 'form-control')); ?>
					<?php echo $form->label('fechaNacimiento'); ?>
					<?php echo $form->render('fechaNacimiento', array('class' => 'form-control')); ?>
					<!--<input type="number" placeholder="dd" class="form-control">
					<input type="number" placeholder="mm" class="form-control">
					<input type="number" placeholder="yyyy" class="form-control">-->
				</div>

				<div class="form-group form-inline">
					<?php echo $form->render('pais', array('class' => 'form-control')); ?>
					<?php echo $form->render('ciudad', array('class' => 'form-control')); ?>
					<?php echo $form->render('distrito', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->render('direccion', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group form-inline">
					<?php echo $form->label('hombre'); ?> <?php echo $form->render('hombre', array('class' => 'form-control')); ?>
					<label>			</label>
					<?php echo $form->label('mujer'); ?> <?php echo $form->render('mujer', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $this->tag->submitButton(array('Registrarse', 'class' => 'btn btn-primary col-md-4 col-md-offset-4')); ?>
				</div>
			<?php echo $this->tag->endForm(); ?>
		</div>
	</div>
</div>