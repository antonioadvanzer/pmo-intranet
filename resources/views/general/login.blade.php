@extends('layout.basicLayout')

@section('content')

    <!-- Login Form-->
    <div class="container" >

        <div align="center">
            <div class="login-wrapper">
                <form class="login-form">
                    <!-- username -->
                    <div class="username">
                        <label><span class="entypo-user"></span></label>
                        <input type="text" placeholder="Nombre de usuario"/>
                    </div>
                    <!-- password -->
                    <div class="password">
                        <label><span class="entypo-lock"></span></label>
                        <input type="password" placeholder="Contraseña"/>
                    </div>
                    <!-- button -->
                    <button class="btn">Iniciar Sesion</button>
                    <p>
                        ¿Olvido su contraseña? <a href="#" class="link">Sign up now <span class="entypo-right-thin"></span></a>
                    </p>
                </form>
            </div> <!-- /login-wrapper -->
        </div>

    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){


        });
    </script>
@endsection