@extends('layout.entuizer.mainLayout')

@section('content')
    <!-- desktop-->
    <div class="container" align="center">
        <h1>Unidades de Negocio</h1>
    </div>
    <div id="desktop" class="container" >

        <nav id="mm" class='menu'>
            <a class="nav" href="pmo/organizacion.html" target="main">
                <div class="icon">
                    <!--<i class="fa fa-sitemap" aria-hidden="true"></i>-->
                </div>
                <i class="fa fa-folder-open-o fa-6" aria-hidden="true"></i>
                <div class="icon">Proyectos de Consultoria</div>
            </a>
            <a class="nav" href="pmo/modelo.html" target="main">
                <div class="icon">
                    <!--<i class="fa fa-gear fa-spin"></i>-->
                </div>
                <i class="fa fa-laptop fa-6" aria-hidden="true"></i>
                <div class="icon">Proyectos de Tecnolog&iacute;a</div>
            </a>
        </nav>

        <!-- Modal Window -->
        <div id="modal" class="hide">
            <div id="barra" align="center">
                <span class="entypo-cancel fa fa-arrow-left" id="close"></span>
                <h4 id="title">Titulo</h4>
            </div>
            <iframe name="main" frameborder=0 width="100%" height="85%"></iframe>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){



        });
    </script>
@endsection