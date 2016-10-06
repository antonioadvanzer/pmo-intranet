@extends('layout.advanzer.mainLayout')

@section('content')
    <!-- desktop-->
    <div id="desktop" class="container" >

        <nav id="mm" class='menu'>
            <a class="nav" href="pmo/organizacion.html" target="main">
                <div class="icon">
                    <!--<i class="fa fa-sitemap" aria-hidden="true"></i>-->
                </div>
                <i class="fa fa-sitemap fa-6" aria-hidden="true"></i>
                <div class="icon">Organización</div>
            </a>
            <a class="nav" href="pmo/modelo.html" target="main">
                <div class="icon">
                    <!--<i class="fa fa-gear fa-spin"></i>-->
                </div>
                <i class="fa fa-gear fa-spin fa-6" aria-hidden="true"></i>
                <div class="icon">Modelo</div>
            </a>
            <a class="nav" href="pmo/planeacion_y_metodologia.html" target="main">
                <div class="icon">
                    <!--<i class="fa fa-book fa-fw"></i>-->
                </div>
                <i class="fa fa-book fa-fw fa-6" aria-hidden="true"></i>
                <div class="icon">Planeación y Metodología</div>
            </a>
            <a class="nav" href="pmo/seguimiento.html" target="main">
                <div class="icon">
                    <!--<i class="fa fa-retweet"></i>-->
                </div>
                <i class="fa fa-retweet fa-6" aria-hidden="true"></i>
                <div class="icon">Seguimiento</div>
            </a>
            <a class="nav" href="pmo/implementacion.html" target="main">
                <div class="icon">
                    <!--<i class="fa fa-cloud-upload"></i>-->
                </div>
                <i class="fa fa-cloud-upload fa-6" aria-hidden="true"></i>
                <div class="icon">Implementación</div>
            </a>
            <a class="nav" href="pmo/golive.html" target="main">
                <div class="icon">
                    <!--<i class="fa fa-rss"></i>-->
                </div>
                <i class="fa fa-rss fa-6" aria-hidden="true"></i>
                <div class="icon">GoLive</div>
            </a>
            <a class="nav" href="pmo/cierre_de_proyecto.html" target="main">
                <div class="icon">
                    <!--<i class="fa fa-sign-out"></i>-->
                </div>
                <i class="fa fa-sign-out fa-6" aria-hidden="true"></i>
                <div class="icon">Cierre del Proyecto</div>
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

            /*var $box = $('.box');

             $('.menu a').each(function(){

             var color = $(this).css('backgroundColor');
             var content = $(this).html();


             $(this).click(function() {
             $box.css('backgroundColor', color);
             $box.addClass('open');
             $box.find('p').html(content);
             });

             $('.close').click(function() {
             $box.removeClass('open');
             $box.css('backgroundColor', 'transparent');
             });

             });*/


            // Open Modal Window
            $(".menu a").click(function(e) {

                //$("#mm").animate({right: '50%',opacity: '0.09',});
                //$("#mm").addClass("hide");

                var title = $(this).text();
                //alert(title);

                $("#title").text(title);

                $("#mm").hide('slow');

                $("#modal").show('slow');

                $("#modal").removeClass("hide");
                $("#modal").addClass("window");


            });

            // Close Modal Window
            $("#close").click(function() {

                $("#modal").hide('fast');

                $("#modal").removeClass("window");
                //$("#modal").addClass("hide");


                $("#mm").show('slow');

                //$("#mm").animate({left: '50%',opacity: '0.1',});
            });

        });
    </script>
@endsection