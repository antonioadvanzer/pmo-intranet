@extends('layout.mainLayout')

@section('content')
    <!-- desktop-->
    <div class="container" align="center">
        <!--<h1 class="titleMenu">Unidades de Negocio</h1>-->
    </div>
    <div id="desktop" class="container" >
        <br><br>
        <div class="">

            <span class="toggler active" data-toggle="grid"><span class="glyphicon glyphicon-th"></span></span>
            <span class="toggler" data-toggle="list"><span class="glyphicon glyphicon-th-list"></span></span>

            <ul class="surveys grid">
                <!--
                <li class="survey-item">
                    
                    <input type="hidden" id="route" class="route" value="{{ URL::to('advanzer/projects/project') }}">
                    
                    <span class="survey-country list-only">
                    Cliente A
                    </span>

                    <span class="survey-name">
                        Proyecto 1
                    </span>

                    <span class="survey-country grid-only">
                    Cliente A
                    </span>

                    <div class="pull-right">

                    <span class="survey-progress">
                    <span class="survey-progress-bg">
                    <span class="survey-progress-fg" style="width: 88%;"></span>
                    </span>

                    <span class="survey-progress-labels">
                    <span class="survey-progress-label">
                    88%
                    </span>

                    <span class="survey-completes">
                    490 / 500
                    </span>
                    </span>
                    </span>

                    <span class="survey-end-date ended">
                    2014 - May 10
                    </span>
                    <span class="survey-stage">
                    <span class="stage draft">Draft</span>
                    <span class="stage awarded">Awarded</span>
                    <span class="stage live">Live</span>
                    <span class="stage ended active">Ended</span>
                    </span>
                    </div>
                </li>

                <li class="survey-item">
                    
                    <input type="hidden" id="route" class="route" value="{{ URL::to('advanzer/projects/project') }}">
                    
                    <span class="survey-country list-only">
                    Cliente B
                    </span>

                    <span class="survey-name">
                    Proyecto 2
                    </span>

                    <span class="survey-country grid-only">
                    Cliente B
                    </span>

                    <div class="pull-right">

                    <span class="survey-progress">
                    <span class="survey-progress-bg">
                    <span class="survey-progress-fg" style="width: 25%;"></span>
                    </span>

                    <span class="survey-progress-labels">
                    <span class="survey-progress-label">
                    25%
                    </span>

                    <span class="survey-completes">
                    150 / 500
                    </span>
                    </span>
                    </span>

                    <span class="survey-end-date">
                    2014 - July 12
                    </span>
                    <span class="survey-stage">
                    <span class="stage draft">Draft</span>
                    <span class="stage awarded">Awarded</span>
                    <span class="stage live active">Live</span>
                    <span class="stage ended">Ended</span>
                    </span>
                    </div>
                </li>

                <li class="survey-item">
                    
                    <input type="hidden" id="route" class="route" value="{{ URL::to('advanzer/projects/project') }}">
                    
                    <span class="survey-country list-only">
                    Cliente C
                    </span>

                    <span class="survey-name">
                    Proyecto 3
                    </span>

                    <span class="survey-country grid-only">
                    Cliente C
                    </span>

                    <div class="pull-right">
                    <span class="survey-end-date">
                    2014 - Oct 1
                    </span>
                    <span class="survey-stage">
                    <span class="stage draft">Draft</span>
                    <span class="stage awarded active">Awarded</span>
                    <span class="stage live">Live</span>
                    <span class="stage ended">Ended</span>
                    </span>
                    </div>
                </li>
                -->
                
                @foreach($projects as $p)
                
                    <li class="survey-item">
                    
                    <input type="hidden" id="route" class="route" value="{{ $p['route'] }}">
                    
                    <span class="survey-country list-only">
                        {{ $p['client'] }}
                    </span>

                    <span class="survey-name">
                        {{ $p['name'] }}
                    </span>

                    <span class="survey-country grid-only">
                        {{ $p['client'] }}
                    </span>

                    <div class="pull-right">

                    <span class="survey-progress">
                    <span class="survey-progress-bg">
                    <span class="survey-progress-fg" style="width: {{ $p['progress'] }}%;"></span>
                    </span>

                    <span class="survey-progress-labels">
                    <span class="survey-progress-label">
                    {{ $p['progress'] }}%
                    </span>

                    <span class="survey-completes">
                    490 / 500
                    </span>
                    </span>
                    </span>

                    <span class="survey-end-date ended">
                    2014 - May 10
                    </span>
                    <span class="survey-stage">
                    <span class="stage draft">Draft</span>
                    <span class="stage awarded">Awarded</span>
                    <span class="stage live">Live</span>
                    <span class="stage ended active">Ended</span>
                    </span>
                    </div>
                </li>
                
                @endforeach
                
            </ul>

        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            (function () {
                $(function () {
                    return $('[data-toggle]').on('click', function () {
                        var toggle;
                        toggle = $(this).addClass('active').attr('data-toggle');
                        $(this).siblings('[data-toggle]').removeClass('active');
                        return $('.surveys').removeClass('grid list').addClass(toggle);
                    });
                });
            }.call(this));
            
            $('.survey-item').click(function (){
                location.href = $(this).find(".route").val();
            });
            
        });
    </script>
@endsection