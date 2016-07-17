<?php echo $this->getContent(); ?>

<h1>Mis Mascotas</h1>
<?php echo $this->tag->linkTo(array('cuenta/registrarMascota', 'Nueva mascota', 'class' => 'btn btn-primary')); ?>
<br>
<br>

<?php foreach ($mascotas as $mascota) { ?>
    <!-- Pop Up -->
    <div class="modal fade" id=<?php echo 'modal' . $mascota->urlFoto; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id=<?php echo 'myModalLabel-' . $mascota->urlFoto; ?>>Lista de Adoptantes</h4>
          </div>
          <div class="modal-body">
            <table style="width:100%">
                <?php foreach ($mascota->colaAdoptantes as $adoptante) { ?>
                    <tr>
                        <td> <?php echo $adoptante; ?> </td>
                        <td> <button class="btn btn-primary">Ver</button> </td>
                        <td> <button class="btn btn-primary">Seleccionar</button> </td>
                    </tr>
                <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Pop Up -->

    <div class="row">
        <div class='col-md-3 col-md-offset-1'>
                <div class='list-group gallery'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="#">
                        <?php echo $this->elements->getImgCloud($mascota->urlFoto, array('class' => 'img-responsive', 'crop' => 'fill')); ?>
                        <div class='text-right'>
                            <medium class='text-muted'><?php echo ucwords($mascota->nombre); ?></medium>
                        </div> <!-- text-right / end -->
                    </a>
                    <?php echo $this->tag->linkTo(array('cuenta/editarMascota/' . $mascota->nombre, '<i class="glyphicon glyphicon-edit"></i> Editar mascota', 'class' => 'btn btn-primary')); ?>
                </div> 
        </div>
        <div class="col-md-5">

            <table class="table table-bordered table-striped" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th>Característica</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Raza</td>
                        <td><?php echo ucwords($mascota->raza); ?></td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td><?php echo ucwords($mascota->sexo); ?></td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td id="<?php echo 'tdEstado-' . $mascota->urlFoto; ?>"><?php echo ucwords($mascota->estado); ?></td>
                    </tr>
                </tbody>
            </table><br>
                    <?php if ($mascota->estado == 'En Espera') { ?>
                        <button id="<?php echo 'btnEstado-' . $mascota->urlFoto; ?>" class="btn btn-primary btn-adopcion btn-adoptar">Dar en Adopcion</button><br><br>
                    <?php } else { ?>
                        <button id="<?php echo 'btnEstado-' . $mascota->urlFoto; ?>" class="btn btn-primary btn-adopcion btn-desadoptar">Cancelar Adopcion</button><br><br>
                    <?php } ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="<?php echo '#modal' . $mascota->urlFoto; ?>">Ver adoptantes</button>
        </div><!-- col-6 / end -->
    </div><!-- row / end-->
    <hr/>
<?php } ?>

<script>
    $(document).ready(function(){
        $(".btn-adopcion").click(function(e){
            e.preventDefault();
            var btnAdoptar = $(this);
            var id = $(this).attr("id");
            var arr = id.split('-');
            var tdEstado = $('#tdEstado-'+arr[1]);

            if (btnAdoptar.html()=='Dar en Adopcion') {
                $.post("<?php echo $this->url->get('cuenta/editarEstado') ?>", {urlFoto:arr[1],estado:'espera'}, function(data)
                {
                    var resultado = JSON.parse(data);
                    if (resultado.res) {
                        btnAdoptar.html('Cancelar Adopcion');
                        btnAdoptar.removeClass('btn-adoptar');
                        btnAdoptar.addClass('btn-desadoptar');
                        tdEstado.html('En Adopcion');

                        $.post("<?php echo $this->url->get('cuenta/postearFB') ?>", {imagen:resultado.urlFoto,descripcion:resultado.descripcion}, function(data2)
                        {
                            var respuesta = JSON.parse(data2);
                            if(respuesta.res) { 

                            }
                        })
                    }
                })
            } else {
                $.post("<?php echo $this->url->get('cuenta/editarEstado') ?>", {urlFoto:arr[1],estado:'adopcion'}, function(data)
                {
                    var resultado = JSON.parse(data);
                    if (resultado.res) {
                        btnAdoptar.html('Dar en Adopcion');
                        btnAdoptar.removeClass('btn-desadoptar');
                        btnAdoptar.addClass('btn-adoptar');
                        tdEstado.html('En Espera');
                    }
                })
            }
        });
    });
</script>