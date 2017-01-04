@extends('layout.admin.adminLayout')

@section('content')

<div class="right_col" role="main">
  <div class="">
    
    <div class="page-title">
        <div class="title_left">
          <h3>Roles <small></small></h3>
        </div>
    </div>

    <div class="clearfix"></div>
      
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ver Rol <small></small></h2>
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
                          action="">
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol-name">Nombre <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="rol-name" name="rol-name" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $rol->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol-description">Descipci&oacute;n <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="rol-description" name="rol-description" class="form-control col-md-7 col-xs-12 rol-attr" disabled>{{ $rol->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Permisos <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <?php $permissions = $rol->getAllPermissions()->get();?>
                                
                                @foreach($permissions as $p)
                                <div class="btn-group">
                                    <button class="btn btn-default" type="button">
                                        @if($p->C != null)
                                            {{ App\Models\Company::where('id',$p->C)->first()->name }}
                                        @else
                                            Todos
                                        @endif
                                    </button>
                                    <button class="btn btn-info" type="button">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                    <button class="btn btn-default" type="button">
                                        @if($p->BU != null)
                                            {{ App\Models\BusinessUnit::where('id',$p->C)->first()->name }}
                                        @else
                                            Todos
                                        @endif
                                    </button>
                                    <button class="btn btn-info" type="button">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                    <button class="btn btn-default" type="button">
                                        @if($p->P != null)
                                            {{ App\Models\Project::where('id',$p->C)->first()->name }}
                                        @else
                                            Todos
                                        @endif
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default" type="button">
                                        @if($p->ABU)
                                        <i class="fa fa-check-circle-o"> Atributos de Unidades de Negocio </i>
                                        @else
                                        <i class="fa fa-times-circle-o"> Atributos de Unidades de Negocio </i>
                                        @endif
                                    </button>
                                    <button class="btn btn-default" type="button">
                                        @if($p->AP)
                                        <i class="fa fa-check-circle-o"> Atributos de Proyectos </i>
                                        @else
                                        <i class="fa fa-times-circle-o"> Atributos de Proyectos </i>
                                        @endif
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default" type="button">
                                        @if($p->create)
                                        <i class="fa fa-check-circle-o"> Crear </i>
                                        @else
                                        <i class="fa fa-times-circle-o"> Crear </i>
                                        @endif
                                        
                                        @if($p->read)
                                        <i class="fa fa-check-circle-o"> Leer </i>
                                        @else
                                        <i class="fa fa-times-circle-o"> Leer </i>
                                        @endif
                                        
                                        @if($p->update)
                                        <i class="fa fa-check-circle-o"> Actualizar </i>
                                        @else
                                        <i class="fa fa-times-circle-o"> Actualizar </i>
                                        @endif
                                        
                                        @if($p->delete)
                                        <i class="fa fa-check-circle-o"> Eliminar </i>
                                        @else
                                        <i class="fa fa-times-circle-o"> Eliminar </i>
                                        @endif
                                    </button>
                                    
                                </div><br/><br/><br/>
                                @endforeach
                            
                            </div>
                        </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                          
                            <a href="{{ URL::to('pmo-admin/roles') }}" class="btn btn-primary">Todos</a>
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