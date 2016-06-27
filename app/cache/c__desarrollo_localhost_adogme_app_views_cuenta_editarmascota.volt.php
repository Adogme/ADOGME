<?php echo cloudinary_js_config(); ?>

<?php echo $this->getContent(); ?>

<h1>Edición de Mascota</h1>
<br>
<div id="formulario-registro-usuario" class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Registro de Mascota</div>
		<div class="panel-body">
			<?php echo $this->tag->form(array('cuenta/registrarMascota', 'id' => 'registroMascotaForm', 'method' => 'post')); ?>
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
					Tamaño de pelo:
					<?php echo $form->label('small'); ?> <?php echo $form->render('small', array('class' => 'form-control')); ?>
					<?php echo $form->label('medium'); ?> <?php echo $form->render('medium', array('class' => 'form-control')); ?>
					<?php echo $form->label('large'); ?> <?php echo $form->render('large', array('class' => 'form-control')); ?>
					<?php echo $form->label('vacuna'); ?> <?php echo $form->render('vacuna', array('class' => 'form-control')); ?>
				</div>

				<div class="form-group form-inline">
					Sexo:  
					<?php echo $form->label('macho'); ?> <?php echo $form->render('macho', array('class' => 'form-control')); ?>
					<?php echo $form->label('hembra'); ?> <?php echo $form->render('hembra', array('class' => 'form-control')); ?>
				</div>

			    <div id='direct_upload'>
					<?php echo cl_image_upload_tag('image_id', array("html" => array("multiple" => true))); ?>
					<br>
					<input type="hidden" class="image_public_id" name="fotoID">
					<div class="status">
						<span class="status_value"></span>
						<div class="progress_bar_content" style="width:100px; border-width:thin; height:10px; border-style:solid; display:none">
							<div class="progress_bar" style="height:100%; width:0%; background-color:#286090;"></div>
						</div>
					</div>

					<br>
					<div class="preview"></div>
			    </div>

				<div class="form-group">
					<?php echo $this->tag->submitButton(array('Guardar', 'class' => 'btn btn-primary col-md-4 col-md-offset-4')); ?>
				</div>
			<?php echo $this->tag->endForm(); ?>
		</div>
	</div>
</div>

<script>
  $(function() {
    $('.cloudinary-fileupload')
    .fileupload({ 
      dropZone: '#direct_upload',
      start: function () {
        $('.status_value').text('Starting direct upload...');
        $('.progress_bar_content').css('display', 'block');
      },
      progress: function (e, data) {
        $('.status_value').text('Uploading...');
        $('.progress_bar').css('width', Math.round((data.loaded * 100.0) / data.total) + '%'); 
      },
      done: function (e, data) {
        $('.status_value').text('Done!');
        $('.preview').html(
          $.cloudinary.image(data.result.public_id, 
            { format: data.result.format, version: data.result.version, 
              crop: 'fill', width: 150, height: 100 })
        );    
        $('.image_public_id').val(data.result.public_id);
        $('.progress_bar_content').css('display', 'none');
        return true;
      } 
    })
  });
</script>