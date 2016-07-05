<?php echo $this->getContent(); ?>

<h1>Mis Adopciones</h1>

<ul>
<?php foreach ($mascotas as $mascota) { ?>
	<li><?php echo $mascota->nombre; ?></li>
<?php } ?>
</ul>