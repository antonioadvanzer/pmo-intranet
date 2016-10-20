@extends('layout.basicLayout')

@section('content')
    <!-- desktop-->
    <div id="desktop" class="container" >
        <br><br>
        <div class=''>
            <a class="rr-left" href="{{ URL::to('/advanzer')  }}">
                <div class="rr-text">
                    <h3>Advanzer</h3>
                </div>
            </a>
            <a class="rr-right" href="{{ URL::to('/entuizer')  }}">
                <div class="rr-text">
                    <h3>Entuizer</h3>
                </div>
            </a>
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