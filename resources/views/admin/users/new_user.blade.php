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
                    <h2>Nuevo Usuario <small></small></h2>
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
                        
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
                        <input id="busuni" type="hidden" value="{!! URL::to('pmo-admin/get_business_units') !!}"/>
                        <input id="propmo" type="hidden" value="{!! URL::to('pmo-admin/get_projects') !!}"/>
                        
                        <div class="form-group">
                            @if ($errors->has())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>        
                                @endforeach
                            </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="first-name" name="first-name" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('first-name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="last-name" name="last-name" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('last-name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nick-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de Usuario <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="nick-name" name="nick-name" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('nick-name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Direcci&oacute;n de Correo Electr&oacute;nico <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="email" name="email" type="email" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="password" name="password" type="password" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Confirmar Contraseña <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="confirm-password" name="confirm-password" type="password" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>-->
                        <div id="attr-typeuser" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Usuario</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="type" name="type" class="form-control" required="required">
                                <option disabled selected value>-- Elegir --</option>
                                @foreach($type_user as $tu)
                                <option value="{{ $tu->id }}">{{ $tu->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div id="attr-company" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Empresa</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="company" name="company" class="form-control" required="required">
                                <option disabled selected value>-- Elegir --</option>
                                @foreach($companies as $co)
                                <option value="{{ $co->id }}">{{ $co->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div id="attr-rol" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Rol</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="rol" name="rol" class="form-control" required="required">
                                <option disabled selected value>-- Elegir --</option>
                                @foreach($rol as $r)
                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div id="attr-pmoproject" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">PMO</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!--Empresa
                                <select id="pmo-company" name="pmo" class="form-control" required="required">
                                    <option disabled selected value>-- Elegir --</option>

                                </select>-->
                                Unidad de Negocio
                                <select id="pmo-businessunit" name="pmo" class="form-control" required="required">
                                    <option disabled selected value>-- Elegir --</option>
                                </select>Proyecto
                                <select id="pmo-project" name="pmo" class="form-control" required="required">
                                    <option disabled selected value>-- Elegir --</option>
                                </select>
                            </div>
                        </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancelar</button>
                          <button type="submit" class="btn btn-success">Guardar</button>
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
            
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            
            $.listen('parsley:field:validate', function() {
              validateFront();
            });
            $('#demo-form2 .btn').on('click', function() {
              $('#demo-form2').parsley().validate();
              validateFront();
            });
            var validateFront = function() {
              if (true === $('#demo-form2').parsley().isValid()) {
                $('.bs-callout-info').removeClass('hidden');
                $('.bs-callout-warning').addClass('hidden');
              } else {
                $('.bs-callout-info').addClass('hidden');
                $('.bs-callout-warning').removeClass('hidden');
              }
            };
            
            
            //$('#attr-typeuser').hide();
            $('#attr-company').hide()
            $('#attr-rol').hide();
            $('#attr-pmoproject').hide();
            
        });
        
        $('#type').change(function (){
            val = $(this).val();
            
            switch(val){
                case "1":
                    $('#attr-rol').show("fast");
                    $('#attr-company').hide("fast");
                    $('#attr-pmoproject').hide("fast");
                    
                    $('#rol').prop('required',true);
                    $('#company').prop('required',false);
                    $('#pmo-businessunit').prop('required',false);
                    $('#pmo-project').prop('required',false);
                break;
                case "2":
                    $('#attr-rol').show("fast");
                    $('#attr-company').show("fast");
                    $('#attr-pmoproject').hide("fast");
                    
                    $('#rol').prop('required',true);
                    $('#company').prop('required',true);
                    $('#pmo-businessunit').prop('required',false);
                    $('#pmo-project').prop('required',false);
                break;
                case "3":
                    $('#attr-rol').hide("fast");
                    $('#attr-company').show("fast");
                    $('#attr-pmoproject').show("fast");
                    
                    $('#rol').prop('required',false);
                    $('#company').prop('required',true);
                    $('#pmo-businessunit').prop('required',true);
                    $('#pmo-project').prop('required',true);
                break;
            }
        });
        
        $('#company').change(function (){
            
            if($("#type").val() == "3"){
                
                getResources($("#busuni").val(),{id:$(this).val()},1);
                options = "<option disabled selected value>-- Elegir --</option>";
                $("#pmo-project").html(options);
                
            }
            
        });
        
        $('#pmo-businessunit').change(function (){
                
            getResources($("#propmo").val(),{id:$(this).val()},2);
            
        });
        
        function insertBusinessUnit(datos){
            
            if(datos.length > 0){
                options = "<option disabled selected value>-- Elegir --</option>";

                for(i = 0; i < datos.length; i++){
                    options += "<option value="+datos[i]["id"]+">"+datos[i]["name"]+"</option>";
                }
            }else{
                options = "<option disabled selected value>-- No hay datos disponibles --</option>";
            }
            
            $("#pmo-businessunit").html(options);
        }
        
        function insertProjects(datos){
            
            if(datos.length > 0){
                options = "<option disabled selected value>-- Elegir --</option>";

                for(i = 0; i < datos.length; i++){
                    options += "<option value="+datos[i]["id"]+">"+datos[i]["name"]+"</option>";
                }
            }else{
                options = "<option disabled selected value>-- No hay datos disponibles --</option>";
            }
            
            $("#pmo-project").html(options);
        }
        
        function getResources(url, data, attr){
            //alert(data);
            response = true;
            token = {_token: $('meta[name=_token]').attr('content')};
            
            //data.concat(token);
            data = collect(token, data);
            //alert(data);
            
            $.ajax({
                url: url,
                type: "POST",
                data: data,
                dataType: "json"
            }).done(function(data){
                console.log(data);
                response = true;
                switch(attr){
                    case 1:
                        insertBusinessUnit(data);
                    break;
                    case 2:
                        insertProjects(data);
                    break;
                }
            }).fail(function(data){
                console.log(data);
                response = false;    
            });
            
           return response; 
        }
        
        function collect() {
            var ret = {};
            var len = arguments.length;
            for (var i=0; i<len; i++) {
                for (p in arguments[i]) {
                    if (arguments[i].hasOwnProperty(p)) {
                        ret[p] = arguments[i][p];
                    }
                }
            }
            return ret;
        }
    </script>
@endsection