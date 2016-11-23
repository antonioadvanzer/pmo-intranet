@extends('layout.mainLayout')

@section('content')
    <!-- desktop-->
    <div class="container" align="center">
        <h1 class="titleMenu">Unidades de Negocio</h1>
    </div>
    <div id="desktop" class="container" >

        <nav id="mm" class='menu'>
            <!--<a class="nav open" href="#" target="">
                <div class="icon">
                    <--<i class="fa fa-sitemap" aria-hidden="true"></i>--
                </div>
                <i class="fa fa-car fa-6" aria-hidden="true"></i>
                <div class="icon">Automotriz</div>
            </a>
            <a class="nav open" href="#" target="">
                <div class="icon">
                    <--<i class="fa fa-gear fa-spin"></i>--
                </div>
                <i class="fa fa-industry fa-6" aria-hidden="true"></i>
                <div class="icon">Industria Privada</div>
            </a>
            <a class="nav open" href="#" target="">
                <div class="icon">
                    <--<i class="fa fa-book fa-fw"></i>--
                </div>
                <i class="fa fa-book fa-6" aria-hidden="true"></i>
                <div class="icon">Gobierno</div>
            </a>
            <a class="nav open" href="#" target="">
                <div class="icon">
                    <--<i class="fa fa-retweet"></i>--
                </div>
                <i class="fa fa-line-chart fa-6" aria-hidden="true"></i>
                <div class="icon">Financieras y Mesa de Ayuda</div>
            </a>-->
            
            @foreach($business as $b)
            
            <a id="{{$b['id']}}" name="{{'ub'.$b['id']}}" class="nav open" href="#" target="">
                <div class="icon">
                </div>
                <i class="fa {{$b['icon']}} fa-6" aria-hidden="true"></i>
                <div class="icon">{{$b['name']}}</div>
                
                <input id="{{'project'.$b['id']}}" type="hidden" value="{{ $b['rute'] }}">
                
                @foreach($b['attributes'] as $atts => $at)
                    <input id="{{ $atts }}" type="hidden" value="{{ $at }}" class="attributes">
                @endforeach
            </a>
            
            @endforeach
            
        </nav>

        <div id="somedialog" class="dialog">
            <div class="dialog-overlay"></div>
            <div class="dialog-content">
                <h2>Categorias</h2>
                <!--<div>
                    <a href="{{ URL::to('advanzer/projects')  }}" class="nav open">Proyectos</a><br><br><br>
                    <a href="#" class="alert alert-success">Empaquetamiento</a>
                </div>-->
                <div class="row">
                    <!--<div class="col-md-3 col-sm-3 col-xs-6"> <a href="#" class="btn btn-sm animated-button sandy-one">Sign up</a> </div>-->
                    
                    <div class="col-md-12 col-sm-12 col-xs-12"> <a id="rute" href="#" class="animated-button victoria-one">Proyectos</a> </div>
                    <!--<div class="col-md-12 col-sm-12 col-xs-12"> <a id="rute2" href="#" class="animated-button victoria-one">Administraci&oacute;n del Conocimiento</a> </div>-->
                    
                    <div id="attributesWindow"></div>
                    
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
                
                //alert($(this).children("attributes"));
                
                $('#attributesWindow').html("");
                
                $(this).find(".attributes").each( function() {
                    
                    ruta = $(this).val();
                    
                    $('#attributesWindow').html(""+$('#attributesWindow').html()+'<div class="col-md-12 col-sm-12 col-xs-12"> <a href="'+ruta+'" class="animated-button victoria-one">'+$(this).attr('id')+'</a> </div>');
                });
                
                $("#rute").attr("href", $("#project"+this.id).val());
                //$("#rute2").attr("href", $("#2r"+this.id).val());
                
                d.removeClass('dialog-close');
                d.addClass('dialog-open');
                
                //alert($("#1r"+this.id).val()+" "+$("#2r"+this.id).val());
            });
            
            $('.close, .dialog-overlay').click(function(e){
                d.removeClass('dialog-open');
                d.addClass('dialog-close');
            });

        });
    </script>
@endsection