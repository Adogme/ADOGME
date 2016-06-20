<?php echo $this->getContent(); ?>

<h1>Mis Mascotas</h1>
<?php echo $this->tag->linkTo(array('cuenta/registrarMascota', 'Nueva mascota', 'class' => 'btn btn-primary')); ?>
<br>
<br>

<?php foreach ($mascotas as $mascota) { ?>
    <div class="row">
        <div class='col-md-3 col-md-offset-1'>
                <div class='list-group gallery'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="#">
                        <?php echo $this->elements->getImgCloud($mascota->urlFoto, array('class' => 'img-responsive')); ?>
                        <div class='text-right'>
                            <small class='text-muted'><?php echo $mascota->nombre; ?></small>
                        </div> <!-- text-right / end -->
                    </a>
                    <?php echo $this->tag->linkTo(array('cuenta/editarMascota', 'Editar mascota', 'class' => 'btn btn-primary')); ?>
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
                        <td><?php echo $mascota->raza; ?></td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td><?php echo $mascota->sexo; ?></td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td><?php echo $mascota->peso; ?></td>
                    </tr>
                </tbody>
            </table><br>
                    <button class="btn btn-primary">Dar en adopcion</button><br><br>
                    <button class="btn btn-primary">Ver adoptantes</button>
        </div><!-- col-6 / end -->
    </div><!-- row / end-->
    <hr/>
<?php } ?>