<?php echo cloudinary_js_config(); ?>

{{ content() }}

<h1>Edición de Mascota</h1>
<br>
<div id="formulario-registro-usuario" class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Registro de Mascota</div>
		<div class="panel-body">
			{{ form('cuenta/registrarMascota', 'id': 'registroMascotaForm', 'method': 'post') }}
				<div class="form-group">
					{{ form.render('nombre', ['class': 'form-control']) }}
				</div>

				<div class="form-group">
					{{ form.render('raza', ['class': 'form-control']) }}
				</div>

				<div class="form-group form-inline">
					{{ form.render('peso', ['class': 'form-control']) }}
					{{ form.render('altura', ['class': 'form-control']) }}
					{{ form.render('edad', ['class': 'form-control']) }}
				</div>

				<div class="form-group">
					{{ form.render('descripcion', ['class': 'form-control']) }}
				</div>

				<div class="form-group form-inline">
					Tamaño de pelo:
					{{ form.label('small') }} {{ form.render('small', ['class': 'form-control']) }}
					{{ form.label('medium') }} {{ form.render('medium', ['class': 'form-control']) }}
					{{ form.label('large') }} {{ form.render('large', ['class': 'form-control']) }}
					{{ form.label('vacuna') }} {{ form.render('vacuna', ['class': 'form-control']) }}
				</div>

				<div class="form-group form-inline">
					Sexo:  
					{{ form.label('macho')}} {{ form.render('macho', ['class': 'form-control'])}}
					{{ form.label('hembra')}} {{ form.render('hembra', ['class': 'form-control'])}}
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
					{{ submit_button('Guardar', 'class': 'btn btn-primary col-md-4 col-md-offset-4') }}
				</div>
			{{ end_form() }}
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