<?php echo $this->getContent(); ?>

<h1>Mis Mascotas</h1>
<br>
<ul>
	<?php foreach ($mascotas as $mascota) { ?>
		<li><?php echo $mascota->nombre; ?></li>
	<?php } ?>
</ul>
<br>
<?php echo $this->tag->linkTo(array('cuenta/registrarMascota', 'Nueva mascota', 'class' => 'btn btn-primary')); ?>