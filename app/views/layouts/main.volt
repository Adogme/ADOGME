<div class="container">
    <header>
        <nav class="navbar navbar-default navbar-fixed-top cabecera">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!--<a href="#" class="navbar-brand" id="cabecera-logo">Adogme</a>-->
                    {{ link_to('index', 'Adogme', 'class':'navbar-brand', 'id': 'cabcera-logo') }}
                </div>

                <div class="collapse navbar-collapse" id="navbar-1">
                    <ul class="nav navbar-nav">
                        <li>{{ link_to('index', 'Inicio') }}</li>
                        <li>{{ link_to('adopcion', 'Adopcion') }}</li>
                        <li>{{ link_to('cuenta', 'Cuenta') }}</li>
                    </ul>

                    <!--<a href="sesion/index" class="nav navbar-nav navbar-right" id="cabecera-login">Iniciar Sesion</a>-->
                    {% if !session.get('auth') %}
                        {{ link_to('sesion', 'Iniciar Sesion', 'class': 'nav navbar-nav navbar-right', 'id': 'cabecera-login') }}
                    {% else %}
                        {{ link_to('sesion/logout', 'Cerrar Sesion', 'class': 'nav navbar-nav navbar-right', 'id': 'cabecera-login') }}
                        {{ link_to('cuenta', 'Usuario', 'class': 'nav navbar-nav navbar-right', 'id': 'cabecera-login') }}
                    {% endif %}
                </div>
            </div>
        </nav>
    </header>
</div>

<div class="container">
    {{ content() }}
</div>