@extends('layout.admin.adminLayout')

@section('content')

<div class="right_col" role="main">
  <div class="">
    
    <div class="page-title">
        <div class="title_left">
          <h3>Proyectos <small></small></h3>
        </div>
    </div>

    <div class="clearfix"></div>
      
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ver Proyecto <small></small></h2>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-name">Nombre <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="pro-name" name="pro-name" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $project->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-description">Descripci&oacute;n <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="bu-description" name="bu-description" class="form-control col-md-7 col-xs-12 rol-attr" disabled>{{ $project->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-cliente">Cliente <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="pro-client" name="pro-client" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $project->client }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-objective">Objetivo <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="pro-objective" name="pro-objective" class="form-control col-md-7 col-xs-12 rol-attr" disabled>{{ $project->objective }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-scope">Alcance <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="pro-scope" name="pro-scope" class="form-control col-md-7 col-xs-12 rol-attr" disabled>{{ $project->scope }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-company">Empresa <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="pro-compay" name="pro-company" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $project->getBusinessUnitAssociated()->first()->getCompanyAssociated()->first()->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-company">Unidad de Negocio <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="pro-compay" name="pro-company" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $project->getBusinessUnitAssociated()->first()->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-company">Estado <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                @if($project->status)
                                    <button class="btn btn-success" type="button">Activo</button>
                                @else
                                    <button class="btn btn-warning" type="button">Inactivo</button>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-bu">Progreso <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" data-transitiongoal="{{ $project->progress }}"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-template">Plantilla PMO <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pro-template" name="pro-template" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $project->getPMO()->first()->getPmoCategoryAssociated()->first()->name }}" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bu-icon">Atributos <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php $attributes = $project->getAttributesValues()->get(); ?>
                                <div class="btn-group-vertical">
                                    @foreach($attributes as $attr)
                                    <button class="btn btn-default" type="button">{{ $attr->getProjectAttributeAssociated()->first()->name}}</button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                          
                            <a href="{{ URL::to('pmo-admin/projects') }}" class="btn btn-primary">Todos</a>
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
    <!-- bootstrap-progressbar -->
    <script src="{{URL::to('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    
    <!-- Custom Theme Scripts -->
    <!--<script src="{{URL::to('build/js/custom.min.js') }}"></script>-->

    <script type="text/javascript">
        $(document).ready(function() {
        
        });
    </script>
@endsection