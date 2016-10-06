<!DOCTYPE html>
<html lang="en">
<head>

    <title>Advanzer - PMO</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="img/favicon.ico'">

    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/general/styles.css') }}">

    <link href="http://fonts.googleapis.com/css?family=Oswald:700|Droid+Serif:400,700italic" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>

    <!--<script type="text/javascript" src="js/TweenLite.min.js"></script>
	<script type="text/javascript" src="js/TweenMax.min.js"></script>-->
    <script type="text/javascript" src="{{ URL::to('js/jquery-1.8.3.min.js') }}"></script>


</head>
<body>


<!--header-->
<div class="cabecera container">
    <!--<div>
        <div id="caption"> </div>
        <div id="advanzer">
            <img src="{{ URL::to('img/AD_logo.png') }}" width="20%" />
        </div>
        <div id="pagecaption" align="center"> <h2>PMO Web, Demo Cloud Edition</h2> </div>
        <div id="entuizer">
            <img src="{{ URL::to('img/EN_logo.png') }}" width="20%" />
        </div>
    </div>-->

    <div align="center">
        <img src="{{ URL::to('img/AD_logo.png') }}" width="20%" style="min-width: 60px; max-width: 200px" />
        <h3 style="width: 50%;display: inline-block; font-size: 120%; text-transform: uppercase;">PMO Intranet, Bienvenido</h3>
        <img src="{{ URL::to('img/EN_logo.png') }}" width="20%" style="min-width: 60px; max-width: 200px;" />
    </div>

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

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

@yield('script')

</body>