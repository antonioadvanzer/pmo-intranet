@extends('layout.advanzer.mainLayout')

@section('content')
    <!-- desktop-->
    <div class="container" align="center">
        <h1 class="titleMenu">Unidades de Negocio</h1>
    </div>
    <div id="desktop" class="container" >

        <nav id="mm" class='menu'>
            <a class="nav open" href="#" target="">
                <div class="icon">
                    <!--<i class="fa fa-sitemap" aria-hidden="true"></i>-->
                </div>
                <i class="fa fa-car fa-6" aria-hidden="true"></i>
                <div class="icon">Automotriz</div>
            </a>
            <a class="nav open" href="#" target="">
                <div class="icon">
                    <!--<i class="fa fa-gear fa-spin"></i>-->
                </div>
                <i class="fa fa-industry fa-6" aria-hidden="true"></i>
                <div class="icon">Industria Privada</div>
            </a>
            <a class="nav open" href="#" target="">
                <div class="icon">
                    <!--<i class="fa fa-book fa-fw"></i>-->
                </div>
                <i class="fa fa-book fa-6" aria-hidden="true"></i>
                <div class="icon">Gobierno</div>
            </a>
            <a class="nav open" href="#" target="">
                <div class="icon">
                    <!--<i class="fa fa-retweet"></i>-->
                </div>
                <i class="fa fa-line-chart fa-6" aria-hidden="true"></i>
                <div class="icon">Financieras y Mesa de Ayuda</div>
            </a>
        </nav>

        <div id="somedialog" class="dialog">
            <div class="dialog-overlay"></div>
            <div class="dialog-content">
                <h2>Categorias</h2>
                <div>
                    <!--<a href="#" class="close btn btn-close">I'm Jelly</a>-->
                    <a href="{{ URL::to('advanzer/projects')  }}" class="alert alert-success">Proyectos</a><br><br><br>
                    <a href="#" class="alert alert-success">Empaquetamiento</a>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            var d = $('#somedialog');
            $('.open').click(function(e){
                d.removeClass('dialog-close');
                d.addClass('dialog-open');
            });
            $('.close, .dialog-overlay').click(function(e){
                d.removeClass('dialog-open');
                d.addClass('dialog-close');
            });

        });
    </script>
@endsection