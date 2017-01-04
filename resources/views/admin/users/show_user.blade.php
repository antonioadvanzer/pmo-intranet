@extends('layout.admin.adminLayout')

@section('content')

<div class="right_col" role="main">
  <div class="">
    
    <div class="page-title">
        <div class="title_left">
        <!--<h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>-->
          <h3>Usuarios <small>(Administradores, Empleados, Clientes)</small></h3>
        </div>
    </div>

    <div class="clearfix"></div>
      
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ver Usuario <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                      <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                          action="{{ URL::to('pmo-admin/saveNewUser') }}">
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="first-name" name="first-name" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="last-name" name="last-name" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->last_name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nick-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de Usuario <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="nick-name" name="nick-name" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->nickname }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Direcci&oacute;n de Correo Electr&oacute;nico <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="email" name="email" type="email" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->email }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="password" name="password" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->password }}" disabled>
                            </div>
                        </div>
                        <div id="attr-typeuser" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Usuario</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="type" name="type" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->getTypeUser()->first()->name }}" disabled>
                            </div>
                        </div>
                        @if(($user->type == 2)|| ($user->type == 3))
                        <div id="attr-company" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Empresa</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="company" name="company" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->getCompany()->first()->name }}" disabled>
                            </div>
                        </div>
                        @endif
                        @if(($user->type == 1)|| ($user->type == 2))
                        <div id="attr-rol" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Rol</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="rol" name="rol" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->getRol()->first()->name }}" disabled>
                            </div>
                        </div>
                        @endif
                        @if($user->type == 3)
                        <div id="attr-pmoproject" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">PMO</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                
                                Unidad de Negocio
                                <input id="pmo-businessunit" name="pmo-businessunit" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->getPMO()->first()->getProjectAssociated()->first()->getBusinessUnitAssociated()->first()->name }}" disabled>
                                <br>Proyecto
                                <input id="pmo-project" name="pmo-project" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $user->getPMO()->first()->getProjectAssociated()->first()->name }}" disabled>
                            </div>
                        </div>
                        @endif

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                          
                            <a href="{{ URL::to('pmo-admin/users') }}" class="btn btn-primary">Todos</a>
                            <a href="#" class="btn btn-success">Editar</a>
                        </div>
                      </div>

                    </form>

                  </div>
                </div>
              </div>
    </div>
      
  </div>
</div>
@endsection

@section('script')
    <!-- bootstrap-progressbar -->
    <script src="{{URL::to('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{URL::to('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{URL::to('js/moment/moment.min.js') }}"></script>
    <script src="{{URL::to('js/datepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{URL::to('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
    <script src="{{URL::to('vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{URL::to('vendors/google-code-prettify/src/prettify.js') }}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{URL::to('vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <!-- Switchery -->
    <script src="{{URL::to('vendors/switchery/dist/switchery.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{URL::to('vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Parsley -->
    <script src="{{URL::to('vendors/parsleyjs/dist/parsley.min.js') }}"></script>
    <!-- Autosize -->
    <script src="{{URL::to('vendors/autosize/dist/autosize.min.js') }}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{URL::to('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
    <!-- starrr -->
    <script src="{{URL::to('vendors/starrr/dist/starrr.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
        
        });
    </script>
@endsection