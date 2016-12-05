@extends('layout.advanzer.mainLayout')

@section('content')
    <!-- desktop-->
    <div id="desktop" class="container" >

        <div align="center">
            <h2>PMO Intranet</h2>
            <h4>Proximamente ...</h4>
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