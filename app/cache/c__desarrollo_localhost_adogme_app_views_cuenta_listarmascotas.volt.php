<?php echo $this->getContent(); ?>

<h1>Mis Mascotas</h1>
<?php echo $this->tag->linkTo(array('cuenta/registrarMascota', 'Nueva mascota', 'class' => 'btn btn-primary')); ?>
<br>
<ul>
	<?php foreach ($mascotas as $mascota) { ?>
		<li><?php echo $mascota->nombre; ?></li>
	<?php } ?>
</ul>
<br>
<div class='list-group gallery'>
	<div class="row">
            <div class='col-md-6'>
                <a class="thumbnail fancybox" rel="ligthbox" href="http://placehold.it/300x320.png">
                    <img class="img-responsive" alt="" src="http://placehold.it/320x320" />
                    <div class='text-right'>
                        <small class='text-muted'>Image Title</small>
                    </div> <!-- text-right / end -->
                </a>
                <?php echo $this->tag->linkTo(array('cuenta/editarMascota', 'Editar mascota', 'class' => 'btn btn-primary btn-sm')); ?>
            </div> <!-- col-6 / end -->
     </div> <!-- row / end-->
