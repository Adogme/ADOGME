
<?php echo $this->getContent(); ?>

<br>
<br>
<div id="formulario-registro-usuario" class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Registro de Usuario</div>
		<div class="panel-body">
			<?php echo $this->tag->form(array('registro/usuario', 'id' => 'registroForm', 'method' => 'post')); ?>
				<div class="form-group col-md-6">
					<?php echo $form->render('nombre', array('class' => 'form-control')); ?>
				</div>
				<div class="form-group col-md-6">
					<?php echo $form->render('apellido', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->render('email', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->render('password', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->render('repeatPassword', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group col-md-6">
					<?php echo $form->render('telefono', array('class' => 'form-control')); ?>
				</div>
				<div class="form-group form-inline col-md-6">
					<?php echo $form->label('fechaNacimiento'); ?>
					<?php echo $form->render('fechaNacimiento', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group col-md-4">
					<?php echo $form->render('pais', array('class' => 'form-control')); ?>
				</div>
				<div class="form-group col-md-4">
					<?php echo $form->render('ciudad', array('class' => 'form-control')); ?>
				</div>
				<div class="form-group col-md-4">
					<?php echo $form->render('distrito', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group col-md-12">
					<?php echo $form->render('direccion', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->label('hombre', array('class' => 'radio-inline')); ?> <?php echo $form->render('hombre'); ?>
					<?php echo $form->label('mujer', array('class' => 'radio-inline')); ?> <?php echo $form->render('mujer'); ?>
				</div>

				<div class="form-group">
					<?php echo $this->tag->submitButton(array('Registrarse', 'class' => 'btn btn-primary col-md-2 col-md-offset-5')); ?>
				</div>
			<?php echo $this->tag->endForm(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$('#pais').autocomplete({
			source : "<?php echo $this->url->get('registro/ajaxPais') ?>"  //['Lima', 'Trujillo', 'Piura', 'Arequipa']
		});

		$('#ciudad').autocomplete({
			source : "<?php echo $this->url->get('registro/ajaxCiudad') ?>"  //['Lima', 'Trujillo', 'Piura', 'Arequipa']
		});

		$('#distrito').autocomplete({
			source : "<?php echo $this->url->get('registro/ajaxDistrito') ?>"  //['Lima', 'Trujillo', 'Piura', 'Arequipa']
		});
	});
</script>