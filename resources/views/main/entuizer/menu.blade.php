@extends('layout.entuizer.mainLayout')

@section('content')
    <!-- desktop-->
    <div class="container" align="center">
        <h1  class="titleMenu">Unidades de Negocio</h1>
    </div>
    <div id="desktop" class="container" >

        <nav id="mm" class='menu'>
            <a class="nav open" href="#" target="">
                <div class="icon">
                    <!--<i class="fa fa-sitemap" aria-hidden="true"></i>-->
                </div>
                <i class="fa fa-folder-open-o fa-6" aria-hidden="true"></i>
                <div class="icon">Proyectos de Consultoria</div>
            </a>
            <a class="nav open" href="#" target="">
                <div class="icon">
                    <!--<i class="fa fa-gear fa-spin"></i>-->
                </div>
                <i class="fa fa-laptop fa-6" aria-hidden="true"></i>
                <div class="icon">Proyectos de Tecnolog&iacute;a</div>
            </a>
        </nav>

        <div id="somedialog" class="dialog">
            <div class="dialog-overlay"></div>
            <div class="dialog-content">
                <h2>Categorias</h2>
                <div>
                    <!--<a href="#" class="close btn btn-close">I'm Jelly</a>-->
                    <a href="{{ URL::to('entuizer/projects')  }}" class="alert alert-info">Proyectos</a><br><br><br>
                    <a href="#" class="alert alert-info">Empaquetamiento</a>
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