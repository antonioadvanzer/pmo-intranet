@extends('layout.admin.adminLayout')

@section('content')

<div class="right_col" role="main">
  <div class="">
    
    <div class="page-title">
        <div class="title_left">
        <!--<h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>-->
          <h3>Proyectos <small></small></h3>
        </div>
    </div>

    <div class="clearfix"></div>
      
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nuevo Proyecto <small></small></h2>
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
                      
                    <div class="form-group">
                        @if ($errors->has())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>        
                            @endforeach
                        </div>
                        @endif
                    </div>
                      
                      <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post"
                          action="{{ URL::to('pmo-admin/saveNewProject') }}">
                        
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
                        <input id="busuni" type="hidden" value="{!! URL::to('pmo-admin/get_business_units') !!}"/>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="pro-name" name="pro-name" type="text" required="required" class="form-control col-md-7 col-xs-12" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pro-description">Descripción <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea id="pro-description" name="pro-description" class="form-control col-md-7 col-xs-12 rol-attr"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pro-client" class="control-label col-md-3 col-sm-3 col-xs-12">Cliente <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="pro-client" name="pro-client" type="text" required="required" class="form-control col-md-7 col-xs-12" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pro-objective" class="control-label col-md-3 col-sm-3 col-xs-12">Objetivo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea id="pro-objective" name="pro-objective" class="form-control col-md-7 col-xs-12 rol-attr"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pro-scope" class="control-label col-md-3 col-sm-3 col-xs-12">Alcance <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea id="pro-scope" name="pro-scope" class="form-control col-md-7 col-xs-12 rol-attr"></textarea>
                            </div>
                        </div>
                        <div id="attr-company" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Empresa</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="pro-company" name="pro-company" class="form-control" required="required">
                                <option disabled selected value>-- Elegir --</option>
                                @foreach($companies as $co)
                                <option value="{{ $co->id }}">{{ $co->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div id="attr-pmoproject" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Unidad de Negocio</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="pmo-businessunit" name="pro-businessunit" class="form-control" required="required">
                                    <option disabled selected value>-- Elegir --</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="radio">
                                    <label>
                                      <input type="radio" checked="" value="1" id="status1" name="pro-status"> Activo
                                    </label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" value="2" id="status2" name="pro-status"> Inactivo
                                    </label>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Progreso</label>
                            <div class="col-md-2">
                              <input class="knob" name="pro-progress" data-width="110" data-height="120" data-displayPrevious=true data-fgColor="#26B99A" data-skin="tron" data-thickness=".2" value="10">
                            </div>
                        </div>
                        <div id="attr-company" class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Plantilla PMO</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="pro-pmo" name="pro-pmo" class="form-control" required="required">
                                <option disabled selected value>-- Elegir --</option>
                                @foreach($pmo as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Atributos </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                
                                @foreach($attributes as $attr)
                                <div class="checkbox">
                                    <label>
                                        <input name="{{$attr->id }}" type="checkbox" class="" checked="checked"> {{ $attr->name }}
                                    </label>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!--<button type="submit" class="btn btn-primary">Cancelar</button>-->
                            <a href="{{ URL::to('pmo-admin/projects') }}" class="btn btn-primary">Cancelar</a>
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
    <script src="{{ URL::to('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ URL::to('js/moment/moment.min.js') }}"></script>
    <script src="{{ URL::to('js/datepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{ URL::to('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
    <script src="{{ URL::to('vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{ URL::to('vendors/google-code-prettify/src/prettify.js') }}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{ URL::to('vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <!-- Switchery -->
    <script src="{{ URL::to('vendors/switchery/dist/switchery.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ URL::to('vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Parsley -->
    <script src="{{ URL::to('vendors/parsleyjs/dist/parsley.min.js') }}"></script>
    <!-- Autosize -->
    <script src="{{ URL::to('vendors/autosize/dist/autosize.min.js') }}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{ URL::to('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
    <!-- starrr -->
    <script src="{{ URL::to('vendors/starrr/dist/starrr.js') }}"></script>
    <!-- jQuery Knob -->
    <script src="{{ URL::to('vendors/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    
    <!-- jQuery Knob -->
    <script>
      $(function($) {

        $(".knob").knob({
          change: function(value) {
            //console.log("change : " + value);
          },
          release: function(value) {
            //console.log(this.$.attr('value'));
            console.log("release : " + value);
          },
          cancel: function() {
            console.log("cancel : ", this);
          },
          /*format : function (value) {
           return value + '%';
           },*/
          draw: function() {

            // "tron" case
            if (this.$.data('skin') == 'tron') {

              this.cursorExt = 0.3;

              var a = this.arc(this.cv) // Arc
                ,
                pa // Previous arc
                , r = 1;

              this.g.lineWidth = this.lineWidth;

              if (this.o.displayPrevious) {
                pa = this.arc(this.v);
                this.g.beginPath();
                this.g.strokeStyle = this.pColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                this.g.stroke();
              }

              this.g.beginPath();
              this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
              this.g.stroke();

              this.g.lineWidth = 2;
              this.g.beginPath();
              this.g.strokeStyle = this.o.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
              this.g.stroke();

              return false;
            }
          }
        });

        // Example of infinite knob, iPod click wheel
        var v, up = 0,
          down = 0,
          i = 0,
          $idir = $("div.idir"),
          $ival = $("div.ival"),
          incr = function() {
            i++;
            $idir.show().html("+").fadeOut();
            $ival.html(i);
          },
          decr = function() {
            i--;
            $idir.show().html("-").fadeOut();
            $ival.html(i);
          };
        $("input.infinite").knob({
          min: 0,
          max: 20,
          stopper: false,
          change: function() {
            if (v > this.cv) {
              if (up) {
                decr();
                up = 0;
              } else {
                up = 1;
                down = 0;
              }
            } else {
              if (v < this.cv) {
                if (down) {
                  incr();
                  down = 0;
                } else {
                  down = 1;
                  up = 0;
                }
              }
            }
            v = this.cv;
          }
        });
      });
    </script>
    <!-- /jQuery Knob -->

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
            
        });
        
        $('#pro-company').change(function (){
            getResources($("#busuni").val(),{id:$(this).val()},1);
            options = "<option disabled selected value>-- Elegir --</option>";
            $("#pro-businessunit").html(options);
            
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