{{ content() }}

<h1>Mis Mascotas</h1>
{{ link_to('cuenta/registrarMascota', 'Nueva mascota', 'class': 'btn btn-primary') }}
<br>
<br>

{% for mascota in mascotas %}
    <!-- Pop Up -->
    <div class="modal fade" id={{ 'modal'~mascota.urlFoto }} tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id={{ "myModalLabel-"~mascota.urlFoto }}>Lista de Adoptantes</h4>
          </div>
          <div class="modal-body">
            <table style="width:100%">
                {% for adoptante in mascota.colaAdoptantes %}
                    <tr>
                        <td> {{ adoptante }} </td>
                        <td> <button class="btn btn-primary">Ver</button> </td>
                        <td> <button class="btn btn-primary">Seleccionar</button> </td>
                    </tr>
                {% endfor %}
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin Pop Up -->

    <div class="row">
        <div class='col-md-3 col-md-offset-1'>
                <div class='list-group gallery'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="#">
                        {{ elements.getImgCloud(mascota.urlFoto, ['class': 'img-responsive', 'crop': 'fill']) }}
                        <div class='text-right'>
                            <medium class='text-muted'>{{ mascota.nombre|capitalize }}</medium>
                        </div> <!-- text-right / end -->
                    </a>
                    {{ link_to('cuenta/editarMascota/' ~ mascota.nombre, '<i class="glyphicon glyphicon-edit"></i> Editar mascota', 'class': 'btn btn-primary') }}
                </div> 
        </div>
        <div class="col-md-5">

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
                        <td>{{ mascota.raza|capitalize }}</td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td>{{ mascota.sexo|capitalize }}</td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td id="{{ 'tdEstado-'~mascota.urlFoto }}">{{ mascota.estado|capitalize }}</td>
                    </tr>
                </tbody>
            </table><br>
                    {% if mascota.estado == 'En Espera' %}
                        <button id="{{ 'btnEstado-'~mascota.urlFoto }}" class="btn btn-primary btn-adopcion btn-adoptar">Dar en Adopcion</button><br><br>
                    {% else %}
                        <button id="{{ 'btnEstado-'~mascota.urlFoto }}" class="btn btn-primary btn-adopcion btn-desadoptar">Cancelar Adopcion</button><br><br>
                    {% endif %}
                    <button class="btn btn-primary" data-toggle="modal" data-target="{{ '#modal'~mascota.urlFoto }}">Ver adoptantes</button>
        </div><!-- col-6 / end -->
    </div><!-- row / end-->
    <hr/>
{% endfor %}

<script>
    $(document).ready(function(){
        $(".btn-adopcion").click(function(e){
            e.preventDefault();
            var btnAdoptar = $(this);
            var id = $(this).attr("id");
            var arr = id.split('-');
            var tdEstado = $('#tdEstado-'+arr[1]);

            if (btnAdoptar.html()=='Dar en Adopcion') {
                $.post("<?php echo $this->url->get('cuenta/editarEstado') ?>", {urlFoto:arr[1],estado:'espera'}, function(data)
                {
                    var resultado = JSON.parse(data);
                    if (resultado.res) {
                        btnAdoptar.html('Cancelar Adopcion');
                        btnAdoptar.removeClass('btn-adoptar');
                        btnAdoptar.addClass('btn-desadoptar');
                        tdEstado.html('En Adopcion');

                        $.post("<?php echo $this->url->get('cuenta/postearFB') ?>", {imagen:resultado.urlFoto,descripcion:resultado.descripcion}, function(data2)
                        {
                            var respuesta = JSON.parse(data2);
                            if(respuesta.res) { 

                            }
                        })
                    }
                })
            } else {
                $.post("<?php echo $this->url->get('cuenta/editarEstado') ?>", {urlFoto:arr[1],estado:'adopcion'}, function(data)
                {
                    var resultado = JSON.parse(data);
                    if (resultado.res) {
                        btnAdoptar.html('Dar en Adopcion');
                        btnAdoptar.removeClass('btn-desadoptar');
                        btnAdoptar.addClass('btn-adoptar');
                        tdEstado.html('En Espera');
                    }
                })
            }
        });
    });
</script>