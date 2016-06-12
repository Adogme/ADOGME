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
                    <!--{{ link_to('index', 'Adogme', 'class':'navbar-brand', 'id': 'cabcera-logo') }}-->
                    <a href="/adogme/index" id="cabcera-logo" class="navbar-brand icon-block"><i class="fa fa-paw fa-2x"></i>ADOGME</a>
                    
                </div>

                {{ elements.getMenu() }}
            </div>
        </nav>
    </header>
</div>

<div class="container">
    {{ content() }}
</div>