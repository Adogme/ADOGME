
{{ content() }}

<br>
<br>
<div id="formulario-registro-usuario" class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">Registro de Albergue</div>
		<div class="panel-body">
			{{ form('registro/albergue', 'id': 'registroForm', 'method': 'post') }}
				<div class="form-group col-md-12">
					{{ form.render('albergue', ['class': 'form-control']) }}
				</div>

				<div class="form-group col-md-12">
					{{ form.render('email', ['class': 'form-control']) }}
				</div>

				<div class="form-group col-md-12">
					{{ form.render('password', ['class': 'form-control']) }}
				</div>

				<div class="form-group col-md-12">
					{{ form.render('repeatPassword', ['class': 'form-control']) }}
				</div>

				<div class="form-group col-md-6">
					{{ form.render('telefono', ['class': 'form-control']) }}
				</div>

				<div class="form-group col-md-6">
					{{ form.render('pais', ['class': 'form-control']) }}
				</div>
				<div class="form-group col-md-6">
					{{ form.render('ciudad', ['class': 'form-control']) }}
				</div>
				<div class="form-group col-md-6">
					{{ form.render('distrito', ['class': 'form-control']) }}
				</div>

				<div class="form-group col-md-12">
					{{ form.render('direccion', ['class': 'form-control']) }}
				</div>

				<div class="form-group col-md-12">
					<hr>
					<h4>Persona de contacto</h4>
				</div>

				<div class="form-group col-md-6">
					{{ form.render('nombre', ['class': 'form-control']) }}
				</div>
				<div class="form-group col-md-6">
					{{ form.render('apellido', ['class': 'form-control']) }}
				</div>

				<div class="form-group">
					{{ submit_button('Registrarse', 'class': 'btn btn-primary col-md-2 col-md-offset-5') }}
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