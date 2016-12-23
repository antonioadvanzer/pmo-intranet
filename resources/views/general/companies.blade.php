@extends('layout.basicLayout')

@section('content')
    <!-- desktop-->
    <div id="desktop" class="container" >
        <br><br>
        <div class=''>
            <a class="rr-left" href="{{ URL::to('/advanzer/businessunit')  }}">
                <div class="rr-text">
                    <h3>Advanzer</h3>
                </div>
            </a>
            <a class="rr-right" href="{{ URL::to('/entuizer/businessunit')  }}">
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

        });
    </script>
@endsection