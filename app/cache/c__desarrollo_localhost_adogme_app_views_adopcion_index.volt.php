<?php echo $this->getContent(); ?><?php $this->_macros['isadopted'] = function($__p = null) { if (isset($__p[0])) { $mascota = $__p[0]; } else { if (isset($__p["mascota"])) { $mascota = $__p["mascota"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'isadopted' was called without parameter: mascota");  } }  ?>
	<?php if ($this->session->get('auth') != null) { ?>
		<?php $email = $this->session->get('auth')['email']; ?>
		<?php foreach ($mascota->colaAdoptantes as $encolado) { ?>
			<?php if ($encolado == $email) { ?>
				<?php return true; ?>
			<?php } ?>
		<?php } ?>
		<?php return false; ?>
	<?php } else { ?>
		<?php return false; ?>
	<?php } ?><?php }; $this->_macros['isadopted'] = \Closure::bind($this->_macros['isadopted'], $this); ?>

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
		                        <label class="checkbox-inline" alt="´rueba"><input type="checkbox" name="tamañoPerro" value="S"><img alt="pequeño" src="/adogme/public/img/dog-TS.png" height="25px" style="margin-top:-10px;"/></label>
		                        <label class="checkbox-inline"><input type="checkbox" name="tamañoPerro"  value="M"><img alt="pequeño" src="/adogme/public/img/dog-TM.png" height="29px" style="margin-top:-10px;"/></label>
		                        <label class="checkbox-inline"><input type="checkbox" name="tamañoPerro"  value="L"><img alt="pequeño" src="/adogme/public/img/dog-TL.png" height="33px" style="margin-top:-10px;"/></label>
		                    </div>
		                    <div class="form-group">
		                        <label>Pelo</label>
		                    </div>
		                    <div class="form-group">
		                        <label class="checkbox-inline"><input type="checkbox" name="peloPerro" value="S"><img alt="pequeño" src="/adogme/public/img/dog-PS.png" height="32px" style="margin-top:-10px;"/></label>
		                        <label class="checkbox-inline"><input type="checkbox" name="peloPerro"  value="M"><img alt="pequeño" src="/adogme/public/img/dog-PM.png" height="32px" style="margin-top:-10px;"/></label>
		                        <label class="checkbox-inline"><input type="checkbox" name="peloPerro"  value="L"><img alt="pequeño" src="/adogme/public/img/dog-PL.png" height="32px" style="margin-top:-10px;"/></label>
		                    </div>
		                    <div class="form-group">
		                        <label>Sexo</label>
		                    </div>
		                    <div class="form-group">
		                        <label class="checkbox-inline"><input type="checkbox" name="sexoPerro"  value="H">Hembra</label>
		                        <label class="checkbox-inline"><input type="checkbox" name="sexoPerro"  value="M">Macho</label>
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
						<?php foreach ($mascotas as $mascota) { ?>
							<!-- Pop Up -->
							<div class="modal fade" id=<?php echo 'modal' . $mascota->urlFoto; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id=<?php echo 'myModalLabel-' . $mascota->urlFoto; ?>><?php echo $mascota->nombre; ?></h4>
							      </div>
							      <div class="modal-body">
							        <?php echo $this->elements->getImgCloud($mascota->urlFoto, array('class' => 'img-responsive', 'width' => '568', 'height' => '300', 'crop' => 'pad')); ?>
							        <br>
									<b>Descripcion: </b> <p><?php echo $mascota->descripcion; ?></p>	
									<b>Raza: </b> <?php echo $mascota->raza; ?> <br>
									<b>Sexo: </b> <?php echo $mascota->sexo; ?> <br>
									<b>Edad: </b> <?php echo $mascota->edad; ?> Años
							      </div>
							      <div class="modal-footer">
							      	<?php if (!$this->callMacro('isadopted', array($mascota))) { ?>
							        	<button type="button" id=<?php echo 'btnAdoptar-' . $mascota->urlFoto; ?> class="btn btn-primary btn-adoptar">Adoptar!</button>
						        	<?php } else { ?>
										<button type="button" id=<?php echo 'btnAdoptar-' . $mascota->urlFoto; ?> class="btn btn-primary btn-desadoptar">Desadoptar</button>
						        	<?php } ?>
							      </div>
							    </div>
							  </div>
							</div>
							<!-- Fin Pop Up -->

						    <div class='list-group gallery'>
				                <a class="thumbnail fancybox" rel="ligthbox" href="#" data-toggle="modal" data-target=<?php echo '#modal' . $mascota->urlFoto; ?>>
				                	<?php echo $this->elements->getImgCloud($mascota->urlFoto, array('class' => 'img-responsive', 'width' => '200', 'height' => '200', 'crop' => 'fill')); ?>
				                    <div class='text-center'>
			                        	<small class='text-muted'><?php echo $mascota->nombre; ?></small>
				                    </div> <!-- text-right / end -->
				                </a>
				                
				            </div>
			            <?php } ?>
			        </div>  
		</div>
	</div>
	
</div>
<script>
	$(document).ready(function(){

	    $(".btn-adoptar").click(function(e){
	    	<?php if ($this->session->get('auth') == null) { ?>
	    		window.location = "<?php echo $this->url->get('sesion/index') ?>";
	    	<?php } ?>

	    	e.preventDefault();
	    	var id = $(this).attr("id");
	    	var arr = id.split('-');
	    	var idTitulo = "#myModalLabel-"+arr[1];
	    	var nombre = $(idTitulo).html();
	    	var btnAdoptar = $(this);
	    	
	    	$.post("<?php echo $this->url->get('adopcion/adoptar') ?>", {nombreM:nombre}, function(data)
			 {
			 	var resultado = JSON.parse(data);
			 	if (resultado.res) {
			 		btnAdoptar.html('Desadoptar');
			 		btnAdoptar.removeClass('btn-adoptar');
		 			btnAdoptar.addClass('btn-desadoptar');
			 	}
		     })
	    });

	    $(".btn-desadoptar").click(function(e){
	    	<?php if ($this->session->get('auth') == null) { ?>
	    		window.location = "<?php echo $this->url->get('sesion/index') ?>";
	    	<?php } ?>

	    	e.preventDefault();
	    	var id = $(this).attr("id");
	    	var arr = id.split('-');
	    	var idTitulo = "#myModalLabel-"+arr[1];
	    	var nombre = $(idTitulo).html();
	    	var btnAdoptar = $(this);
	    	
	    	$.post("<?php echo $this->url->get('adopcion/desadoptar') ?>", {nombreM:nombre}, function(data)
			 {
			 	var resultado = JSON.parse(data);
			 	if (resultado.res) {
			 		btnAdoptar.html('Adoptar!');
			 		btnAdoptar.removeClass('btn-desadoptar');
		 			btnAdoptar.addClass('btn-adoptar');
			 	}
		     })
	    });
	});
</script>