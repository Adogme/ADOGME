<?php echo $this->getContent(); ?>

<h2>
    Datos de la Cuenta
</h2>

<?php if ($usuario->albergue) { ?>
    <table class="table table-bordered table-striped" style="margin-top: 20px;">
        <tbody>
            <tr>
                <td style="width:150px"><b>Albergue:</b></td>
                <td><?php echo ucwords($usuario->albergue); ?></td>
            </tr>
            <tr>
                <td><b>Email:</b></td>
                <td><?php echo $usuario->email; ?></td>
            </tr>
            <tr>
                <td><b>Teléfono:</b></td>
                <td><?php echo $usuario->telefono; ?></td>
            </tr>
            <tr>
                <td><b>Pais:</b></td>
                <td><?php echo ucwords($usuario->pais); ?></td>
            </tr>
            <tr>
                <td><b>Ciudad:</b></td>
                <td><?php echo ucwords($usuario->ciudad); ?></td>
            </tr>
            <tr>
                <td><b>Distrito:</b></td>
                <td><?php echo ucwords($usuario->distrito); ?></td>
            </tr>
            <tr>
                <td><b>Dirección:</b></td>
                <td><?php echo ucwords($usuario->direccion); ?></td>
            </tr>
            <tr>
                <td><b>Representante:</b></td>
                <td><?php echo ucwords($usuario->nombre) . ' ' . $usuario->apellido; ?></td>
            </tr>
        </tbody>
    </table>
<?php } else { ?>
    <table class="table table-bordered table-striped" style="margin-top: 20px;">
        <tbody>
            <tr>
                <td style="width:150px"><b>Nombre:</b></td>
                <td><?php echo ucwords($usuario->nombre); ?></td>
            </tr>
            <tr>
                <td><b>Apellido:</b></td>
                <td><?php echo ucwords($usuario->apellido); ?></td>
            </tr>
            <tr>
                <td><b>Email:</b></td>
                <td><?php echo $usuario->email; ?></td>
            </tr>
            <tr>
                <td><b>Teléfono:</b></td>
                <td><?php echo $usuario->telefono; ?></td>
            </tr>
            <tr>
                <td><b>Pais:</b></td>
                <td><?php echo ucwords($usuario->pais); ?></td>
            </tr>
            <tr>
                <td><b>Ciudad:</b></td>
                <td><?php echo ucwords($usuario->ciudad); ?></td>
            </tr>
            <tr>
                <td><b>Distrito:</b></td>
                <td><?php echo ucwords($usuario->distrito); ?></td>
            </tr>
            <tr>
                <td><b>Dirección:</b></td>
                <td><?php echo ucwords($usuario->direccion); ?></td>
            </tr>
        </tbody>
    </table>
<?php } ?>
