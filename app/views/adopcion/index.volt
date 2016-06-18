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
					    <div class='list-group gallery'>
			                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
			                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" width="200" height="200" />
			                    <div class='text-right'>
			                        <small class='text-muted'>Image Title</small>
			                    </div> <!-- text-right / end -->
			                </a>
			                {{ link_to('#', 'Ver mascota', 'class': 'btn btn-info') }}
			            </div>
			           	<div class='list-group gallery'>
			                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
			                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" width="200" height="200" />
			                    <div class='text-right'>
			                        <small class='text-muted'>Image Title</small>
			                    </div> <!-- text-right / end -->
			                </a>
			                {{ link_to('#', 'Ver mascota', 'class': 'btn btn-info') }}
			            </div>
			           	<div class='list-group gallery'>
			                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
			                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" width="200" height="200" />
			                    <div class='text-right'>
			                        <small class='text-muted'>Image Title</small>
			                    </div> <!-- text-right / end -->
			                </a>
			                {{ link_to('#', 'Ver mascota', 'class': 'btn btn-info') }}
			            </div>
			           	<div class='list-group gallery'>
			                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
			                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" width="200" height="200" />
			                    <div class='text-right'>
			                        <small class='text-muted'>Image Title</small>
			                    </div> <!-- text-right / end -->
			                </a>
			                {{ link_to('#', 'Ver mascota', 'class': 'btn btn-info') }}
			            </div>
			        </div>  
		</div>
	</div>
	
</div>
