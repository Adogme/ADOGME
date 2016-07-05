{{ content() }}

<h1>Mis Adopciones</h1>

<ul>
{% for mascota in mascotas %}
	<li>{{ mascota.nombre }}</li>
{% endfor %}
</ul>