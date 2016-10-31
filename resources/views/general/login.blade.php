@extends('layout.basicLayout')

@section('content')

    <!-- Login Form-->
    <div class="container" >

        <div align="center">
            <div class="login-wrapper">
                <form action="{{ URL::to('/login') }}" method="post" class="login-form">
                    
                    {!! csrf_field() !!}
                    
                    <!-- username -->
                    <div class="username">
                        <label><span class="glyphicon glyphicon-user"></span></label>
                        <input id="login__username" name="login__username" type="text" placeholder="Nombre de usuario" value="{{ old('login__username') }}" required/>
                    </div>
                    <!-- password -->
                    <div class="password">
                        <label><span class="glyphicon glyphicon-cog"></span></label>
                        <input id="login__password" name="login__password" type="password" placeholder="Contraseña" value="{{ old('login__password') }}" required/>
                    </div>
                    <!-- button -->
                    <!--<button class="btn">Iniciar Sesion</button>-->
                    
                    @if(Session::has('flash_error'))
                        <div class="alert alert-danger">
                            {{ Session::get('flash_error') }}
                        </div>
                    @endif
                    
                    <!--<a class="btn" href="{{ URL::to('/companies')  }}">Iniciar Sesion</a>-->
                    <div class="form__field">
                      <input class="btn" type="submit" value="Iniciar Sesión">
                    </div>
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