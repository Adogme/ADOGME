<?= $this->getContent() ?>

<h1>Mis Mascotas</h1>
<?= $this->tag->linkTo(['cuenta/registrarMascota', 'Nueva mascota', 'class' => 'btn btn-primary']) ?>
<br>
<ul>
	<?php foreach ($mascotas as $mascota) { ?>
		<li><?= $mascota->nombre ?></li>
	<?php } ?>
</ul>
<br>
<div class="row">
	<div class='col-md-6'>
            <div class='list-group gallery'>
                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" />
                    <div class='text-right'>
                        <small class='text-muted'>Image Title</small>
                    </div> <!-- text-right / end -->
                </a>
                <?= $this->tag->linkTo(['cuenta/editarMascota', 'Editar mascota', 'class' => 'btn btn-primary']) ?>
            </div> 
    </div>
    <div class="col-md-6">

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
                    <td></td>
                </tr>
                <tr>
                    <td>Sexo</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Peso</td>
                    <td></td>
                </tr>
            </tbody>
        </table><br>
                <button class="btn btn-primary">Dar en adopcion</button><br><br>
                <button class="btn btn-primary">Ver adoptantes</button>
    </div><!-- col-6 / end -->
</div><!-- row / end-->
