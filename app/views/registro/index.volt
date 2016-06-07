
{{ content() }}

<br>
<br>
<div id="formulario-registro-usuario" class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Registro de Usuario</div>
		<div class="panel-body">
			{{ form('registro', 'id': 'registroForm', 'method': 'post') }}
				<div class="form-group form-inline">
					{{ form.render('nombre', ['class': 'form-control']) }}
					{{ form.render('apellido', ['class': 'form-control']) }}
				</div>

				<div class="form-group">
					{{ form.render('email', ['class': 'form-control']) }}
				</div>

				<div class="form-group">
					{{ form.render('password', ['class': 'form-control']) }}
				</div>

				<div class="form-group">
					{{ form.render('repeatPassword', ['class': 'form-control']) }}
				</div>

				<div class="form-group form-inline">
					{{ form.render('telefono', ['class': 'form-control']) }}
					{{ form.label('fechaNacimiento') }}
					{{ form.render('fechaNacimiento', ['class': 'form-control']) }}
				</div>

				<div class="form-group form-inline">
					{{ form.render('pais', ['class': 'form-control']) }}
					{{ form.render('ciudad', ['class': 'form-control']) }}
					{{ form.render('distrito', ['class': 'form-control']) }}
				</div>

				<div class="form-group">
					{{ form.render('direccion', ['class': 'form-control']) }}
				</div>

				<div class="form-group form-inline">
					{{ form.label('hombre') }} {{ form.render('hombre', ['class': 'form-control']) }}
					<label>			</label>
					{{ form.label('mujer') }} {{ form.render('mujer', ['class': 'form-control']) }}
				</div>

				<div class="form-group">
					{{ submit_button('Registrarse', 'class': 'btn btn-primary col-md-4 col-md-offset-4') }}
				</div>
			{{ end_form() }}
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