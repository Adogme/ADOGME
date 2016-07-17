{{ content() }}

<h2>
	Datos Personales
</h2>

<table class="table table-bordered table-striped" style="margin-top: 20px;">
    <tbody>
        <tr>
            <td style="width:150px"><b>Nombre:</b></td>
            <td>{{ usuario.nombre|capitalize }}</td>
        </tr>
        <tr>
            <td><b>Apellido:</b></td>
            <td>{{ usuario.apellido|capitalize }}</td>
        </tr>
        <tr>
            <td><b>Email:</b></td>
            <td>{{ usuario.email }}</td>
        </tr>
        <tr>
            <td><b>Teléfono:</b></td>
            <td>{{ usuario.telefono }}</td>
        </tr>
        <tr>
            <td><b>Pais:</b></td>
            <td>{{ usuario.pais|capitalize }}</td>
        </tr>
        <tr>
            <td><b>Ciudad:</b></td>
            <td>{{ usuario.ciudad|capitalize }}</td>
        </tr>
        <tr>
            <td><b>Distrito:</b></td>
            <td>{{ usuario.distrito|capitalize }}</td>
        </tr>
        <tr>
            <td><b>Dirección:</b></td>
            <td>{{ usuario.direccion|capitalize }}</td>
        </tr>
    </tbody>
</table>