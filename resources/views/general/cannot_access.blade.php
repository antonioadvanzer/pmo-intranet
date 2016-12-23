@extends('layout.basicLayout')

@section('content')
    <!-- desktop-->
    <div id="desktop" class="container" >
        <br><br>
        <div align="center" class='alert alert-danger'>
            <h2>No tienes suficientes permisos para acceder a este recurso</h3>
        </div>


    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>
@endsection