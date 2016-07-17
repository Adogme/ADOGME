{{ content() }}

<h1>Mis Adopciones</h1>

<br>
<h3>En seleccion:</h3>
<ul>
{% for mascota in mascotas %}
	<li>{{ mascota.nombre }}</li>
{% endfor %}
</ul>