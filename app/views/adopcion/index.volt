{{ content() }}
{%- macro isadopted(mascota) %}
	{% if session.get('auth') != null %}
		{% set email = session.get('auth')['email'] %}
		{% for encolado in mascota.colaAdoptantes %}
			{% if encolado == email %}
				{% return true %}
			{% endif %}
		{% endfor %}
		{% return false %}
	{% else %}
		{% return false %}
	{% endif %}
{%- endmacro %}

	<div class="row">
		<div class="col-md-12">
			<h1>Adopcion</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Filtros</h3>
					</div>
					<div class="panel-body">
						<form id="formBuscarAdopción" method="post" action="">
		                    <div class="form-group" style="display:none">
		                        <label>Cita</label>
		                        <input type="text" name="cod_cita" class="form-control col-xs-3" id="cod_cita" maxlength="8" readonly minlength="8"/>
		                    </div>
		                    <div class="form-group">
		                        <label>Tamaño</label>
		                    </div>
		                    <div class="form-group">
		                        <label class="checkbox-inline"><input type="checkbox" checked="true" name="tamañoPerro" value="S">{{ image("img/dog-TS.png", 'height': '25px', 'style': 'margin-top:-10px') }}</label>
		                        <label class="checkbox-inline"><input type="checkbox" checked="true" name="tamañoPerro"  value="M">{{ image("img/dog-TM.png", 'height': '29px', 'style': 'margin-top:-10px') }}</label>
		                        <label class="checkbox-inline"><input type="checkbox" checked="true" name="tamañoPerro"  value="L">{{ image("img/dog-TL.png", 'height': '33px', 'style': 'margin-top:-10px') }}</label>
		                    </div>
		                    <div class="form-group">
		                        <label>Pelo</label>
		                    </div>
		                    <div class="form-group">
		                        <label class="checkbox-inline"><input type="checkbox" checked="true" name="peloPerro" value="S">{{ image("img/dog-PS.png", 'height': '32px', 'style': 'margin-top:-10px') }}</label>
		                        <label class="checkbox-inline"><input type="checkbox" checked="true" name="peloPerro"  value="M">{{ image("img/dog-PM.png", 'height': '32px', 'style': 'margin-top:-10px') }}</label>
		                        <label class="checkbox-inline"><input type="checkbox" checked="true" name="peloPerro"  value="L">{{ image("img/dog-PL.png", 'height': '32px', 'style': 'margin-top:-10px') }}</label>
		                    </div>
		                    <div class="form-group">
		                        <label>Sexo</label>
		                    </div>
		                    <div class="form-group">
		                        <label class="checkbox-inline"><input type="checkbox" checked="true" name="sexoPerro"  value="H">Hembra</label>
		                        <label class="checkbox-inline"><input type="checkbox" checked="true" name="sexoPerro"  value="M">Macho</label>
		                    </div>
							<div class="form-group">
								<label for="">Distrito</label>
								<select class="form-control" name="cod_dist" id="cod_dist">
		                          <option value="0">Elige un distrito</option>
		                          <option value="1">Surco</option>
		                        </select>
							</div>
		                    <div class="form-group">
		                        <button type="submit" class="btn btn-success" id="btnBuscar">Buscar</button>
		                        <button type="button" class="btn btn-default" id="btnLimpiar">Limpiar</button>
		                    </div>
		                </form>
					</div>
			</div>
		</div>
		<div class="col-lg-9">
			<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Mascotas</h3>
					</div>
					<div class="panel-body">
						{% for mascota in mascotas %}
							<!-- Pop Up -->
							<div class="modal fade" id={{ 'modal'~mascota.urlFoto }} tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id={{ "myModalLabel-"~mascota.urlFoto }}>{{ mascota.nombre }}</h4>
							      </div>
							      <div class="modal-body">
							        {{ elements.getImgCloud(mascota.urlFoto, ['class': 'img-responsive', 'width': '568', 'height': '300', 'crop': 'pad']) }}
							        <br>
							        <b>Dueño: </b> {{ mascota.dueno }} <br>
									<b>Descripcion: </b> <p>{{ mascota.descripcion }}</p>	
									<b>Raza: </b> {{ mascota.raza }} <br>
									<b>Sexo: </b> {{ mascota.sexo }} <br>
									<b>Edad: </b> {{ mascota.edad }} Años
							      </div>
							      <div class="modal-footer">
							      	{% if !isadopted(mascota) %}
							        	<button type="button" id={{ 'btnAdoptar-'~mascota.urlFoto }} class="btn btn-primary btn-adopcion btn-adoptar">Adoptar!</button>
						        	{% else %}
										<button type="button" id={{ 'btnAdoptar-'~mascota.urlFoto }} class="btn btn-primary btn-adopcion btn-desadoptar">Desadoptar</button>
						        	{% endif %}
							      </div>
							    </div>
							  </div>
							</div>
							<!-- Fin Pop Up -->

						    <div class='list-group gallery'>
				                <a class="thumbnail fancybox" rel="ligthbox" href="#" data-toggle="modal" data-target={{ '#modal'~mascota.urlFoto }}>
				                	{{ elements.getImgCloud(mascota.urlFoto, ['class': 'img-responsive', 'width': '200', 'height': '200', 'crop': 'fill']) }}
				                    <div class='text-center'>
			                        	<small class='text-muted'>{{ mascota.nombre }}</small>
				                    </div> <!-- text-right / end -->
				                </a>
				                {#{{ link_to('#', 'Ver mascota', 'class': 'btn btn-info', 'data-toggle': 'modal', 'data-target': '#modal'~mascota.urlFoto) }}#}
				            </div>
			            {% endfor %}
			        </div>  
		</div>
	</div>
	
</div>
<script>
	$(document).ready(function(){

		{% if seleccion %}
			//alert('hay seleccion '+ {{ seleccion }} );
			$('#modal{{ seleccion }}').modal('show');
		{% else %}
			//alert('no hay seleccion');
		{% endif %}

	    $(".btn-adopcion").click(function(e){
	    	{% if session.get('auth') == null %}
	    		window.location = "<?php echo $this->url->get('sesion/index') ?>";
	    	{% endif %}

	    	e.preventDefault();
	    	var btnAdoptar = $(this);
	    	var id = $(this).attr("id");
	    	var arr = id.split('-');
	    	var idTitulo = "#myModalLabel-"+arr[1];
	    	var nombre = $(idTitulo).html();

	    	if (btnAdoptar.html()=='Adoptar!') {
	    		$.post("<?php echo $this->url->get('adopcion/adoptar') ?>", {nombreM:nombre}, function(data)
				{
				 	var resultado = JSON.parse(data);
				 	if (resultado.res) {
				 		btnAdoptar.html('Desadoptar');
				 		btnAdoptar.removeClass('btn-adoptar');
			 			btnAdoptar.addClass('btn-desadoptar');
				 	}
			    })
	    	} else {
	    		$.post("<?php echo $this->url->get('adopcion/desadoptar') ?>", {nombreM:nombre}, function(data)
				{
				 	var resultado = JSON.parse(data);
				 	if (resultado.res) {
				 		btnAdoptar.html('Adoptar!');
				 		btnAdoptar.removeClass('btn-desadoptar');
			 			btnAdoptar.addClass('btn-adoptar');
				 	}
			    })
	    	}
	    });
	});
</script>