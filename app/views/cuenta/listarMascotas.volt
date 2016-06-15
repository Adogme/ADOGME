{{ content() }}

<h1>Mis Mascotas</h1>
{{ link_to('cuenta/registrarMascota', 'Nueva mascota', 'class': 'btn btn-primary') }}
<br>
<ul>
	{% for mascota in mascotas %}
		<li>{{ mascota.nombre }}</li>
	{% endfor %}
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
                {{ link_to('cuenta/editarMascota', 'Editar mascota', 'class': 'btn btn-primary btn-sm') }}
            </div> <!-- col-6 / end -->
            <div class="col-md-6">
                Raza:<br>
                Sexo:<br>
                Peso:<br><br>
                <button class="btn btn-primary">Dar en adopcion</button><br><br>
                <button class="btn btn-primary">Ver adoptantes</button>
            </div>
     </div> <!-- row / end-->
