
{{ content() }}

<h1>Tipo de usuario</h1>
<br>
<br>
<div class="btn-registro-usuario col-md-4 col-md-offset-1" onclick="window.location='<?php echo $this->url->get("registro/usuario") ?>';">
	<span style="display:inline-block;height:100%;vertical-align:middle;"></span>
	{{ image("img/petlover.png") }}
</div>

<div class="btn-registro-albergue col-md-4 col-md-offset-2" onclick="window.location='<?php echo $this->url->get("registro/albergue") ?>';">
    <span style="display:inline-block;height:100%;vertical-align:middle;"></span>
	{{ image("img/albergue.png") }}
</div>