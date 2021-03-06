<!DOCTYPE html>
<html lang="en">
<head>

    <title>Advanzer/Entuizer - PMO</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <link rel="icon" href="img/favicon.ico'">

    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <!--<link rel="stylesheet" type="text/css" href="{{ URL::to('css/advanzer/styles.css') }}">-->
    {{ AdvEnt::css() }}

    <link href="http://fonts.googleapis.com/css?family=Oswald:700|Droid+Serif:400,700italic" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>

    <!--<script type="text/javascript" src="js/TweenLite.min.js"></script>
	<script type="text/javascript" src="js/TweenMax.min.js"></script>-->
    <script type="text/javascript" src="{{ URL::to('js/jquery-1.8.3.min.js') }}"></script>

</head>
<body>

<!--header-->
<div class="cabecera container" width="100%">
    <div>
        <div id="caption"> </div>
        <div id="backbutton">
            <!--<img src="{{ URL::to('img/AD_logo.png')}}" width="20%" />-->
            {{ AdvEnt::logo() }}
        </div>
        <div id="pagecaption" align="center"> <h2>PMO Intranet</h2> </div>
        <div id="current-user"><h5><i>{{ AdvEnt::getCurrentUser()['name']." ".AdvEnt::getCurrentUser()['lastname']}}</i></h5></div>
    </div>
    
    <header id="header">
        <nav class="dc-menu">
            <a href="#" class="dc-menu-trigger"><span>Menu</span></a>
            <div class="menu-overlay">
                <ul>
                <li>Perfil</li> 
                <li>Ajustes</li>
                @if(AdvEnt::isAdmin())    
                <li><a href="{{ URL::to('/pmo-admin') }}">Modo Administrador</a></li>
                @endif    
                <li><a href="{{ URL::to('/logout') }}">Cerrar Sesi&oacute;n</a></li>
                </ul>
            </div>
        </nav>
    </header>
    
</div>
<div class="">
    <br>
    <br>
    <br>
</div>
<!-- Maint Container-->
@yield('content')

<div class="box">
    <span class="close"></span>
    <p></p>
</div>

<!--footer-->
<footer>
    <!--<div class="pie">
        <div>
            <p style="">Advanzer de M&eacute;xico</p>
        </div>
    </div>-->
</footer>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $('.dc-menu-trigger').click(function(){
            $('nav').toggleClass( "dc-menu-open" );
            $('.menu-overlay').toggleClass( "open" );
            $('#header').toggleClass( "shownav" );
         }); 
        
        $('.dc-menu-trigger').click(function(event){
            event.stopPropagation();
        });
        
        $(window).click(function(){
            if($('nav').hasClass("dc-menu-open")){
                $('nav').toggleClass( "dc-menu-open" );
                $('.menu-overlay').toggleClass( "open" );
                $('#header').toggleClass( "shownav" );
            }
        });

    });
</script>

@yield('script')

</body>
</html>