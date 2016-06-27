

<?php echo $this->getContent(); ?>
	<div class="row">
		<div class="col-md-12">
			<h1>Adopcion</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-lg-pull-3">
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
		                        <label class="checkbox-inline"><input type="checkbox" name="tamañoPerro" value="S">S</label>
		                        <label class="checkbox-inline"><input type="checkbox" name="tamañoPerro"  value="M">M</label>
		                        <label class="checkbox-inline"><input type="checkbox" name="tamañoPerro"  value="L">L</label>
		                    </div>
		                    <div class="form-group">
		                        <label>Pelo</label>
		                    </div>
		                    <div class="form-group">
		                        <label class="checkbox-inline"><input type="checkbox" name="peloPerro" value="S">S</label>
		                        <label class="checkbox-inline"><input type="checkbox" name="peloPerro"  value="M">M</label>
		                        <label class="checkbox-inline"><input type="checkbox" name="peloPerro"  value="L">L</label>
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
		<div class="col-lg-9 col-lg-pull-3">
			<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Resultados</h3>
					</div>
					<div class="panel-body">
						<?php foreach ($mascotas as $mascota) { ?>
							<!-- Pop Up -->
							<div class="modal fade" id=<?php echo 'modal' . $mascota->urlFoto; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel"><?php echo $mascota->nombre; ?></h4>
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
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-primary">Adoptar!</button>
							      </div>
							    </div>
							  </div>
							</div>

						    <div class='list-group gallery'>
				                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
				                	<?php echo $this->elements->getImgCloud($mascota->urlFoto, array('class' => 'img-responsive', 'width' => '200', 'height' => '200', 'crop' => 'fill')); ?>
				                    <div class='text-center'>
				                        <small class='text-muted'><?php echo $mascota->nombre; ?></small>
				                    </div> <!-- text-right / end -->
				                </a>
				                <?php echo $this->tag->linkTo(array('#', 'Ver mascota', 'class' => 'btn btn-info', 'data-toggle' => 'modal', 'data-target' => '#modal' . $mascota->urlFoto)); ?>
				            </div>
			            <?php } ?>
			        </div>  
		</div>
	</div>
	
</div>
