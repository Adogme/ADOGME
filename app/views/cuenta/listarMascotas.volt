{{ content() }}

<h1>Mis Mascotas</h1>
<br>
<ul>
	{% for mascota in mascotas %}
		<li>{{ mascota.nombre }}</li>
	{% endfor %}
</ul>
<br>
{{ link_to('cuenta/registrarMascota', 'Nueva mascota', 'class': 'btn btn-primary') }}