@extends('layout.admin.adminLayout')

@section('content')

<div class="right_col" role="main">
  <div class="">
    
    <div class="page-title">
        <div class="title_left">
        <!--<h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>-->
          <h3>Roles <small></small></h3>
        </div>
    </div>

    <div class="clearfix"></div>
      
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nuevo Rol <small></small></h2>
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
                
                    <!-- Smart Wizard -->
                    <p></p>
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                  Paso 1<br />
                                  <small>Rol</small>
                              </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                  Paso 2<br />
                                  <small>Asignar Permidos</small>
                              </span>
                          </a>
                        </li>
                        
                      </ul>
                      <div id="step-1">
                          
                        <form class="form-horizontal form-label-left">
                            <p>
                              Describa al nuevo rol 
                            </p>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol-name">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="rol-name" name="rol-name" required="required" class="form-control col-md-7 col-xs-12 rol-attr">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol-descripion">Descripci&oacute;n <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <!--<input type="text" id="rol-descripion" name="rol-descripion" required="required" class="form-control col-md-7 col-xs-12">-->
                                <textarea id="rol-description" name="rol-description" class="form-control col-md-7 col-xs-12 rol-attr"></textarea>
                            </div>
                          </div>
                        </form>

                      </div>
                        <div id="step-2">
                            
                            <h2 class="StepTitle">Asignar Permisos</h2>
                            <p>
                              Eliga el permisos
                            </p>
                            
                            <a id="addPermission" class="btn btn-default">Agregar</a>
                            <br><br>
                            
                            <div class="form-group">
                                
                                <input id="comp" type="hidden" value="{!! URL::to('pmo-admin/get_companies') !!}"/>
                                <input id="busuni" type="hidden" value="{!! URL::to('pmo-admin/get_business_units') !!}"/>
                                <input id="propmo" type="hidden" value="{!! URL::to('pmo-admin/get_projects') !!}"/>
                                
                                <!-- start accordion -->
                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                    
                                  <!--  
                                  <div class="panel">
                                    <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <h4 class="panel-title">Permiso</h4>
                                    </a>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                          
                                        <form class="form-horizontal form-label-left">

                                            <div class="form-group">

                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Empresa:</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select id="sc" class="form-control" tabindex="-1">
                                                    <option selected value="null">-- Todos --</option>
                                                </select>
                                            </div>

                                            </div>
                                            <div class="form-group">

                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Unidad de Negocio:</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select id="sbu" class="form-control" tabindex="-1" disabled="disabled">
                                                    <option selected value="null">-- Todos --</option>
                                                </select>
                                                
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="flat" checked="checked"> Atributos
                                                    </label>
                                                </div>
                                                
                                            </div>

                                            </div>
                                            <div class="form-group">

                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Proyectos:</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select id="sp" class="form-control" tabindex="-1" disabled="disabled">
                                                    <option selected value="null">-- Todos --</option>
                                                </select>
                                                
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" class="flat" checked="checked"> Atributos
                                                    </label>
                                                </div>
                                                <br>
                                                <div class="checkbox btn btn-default">
                                                    <label>
                                                        <input type="checkbox" class="flat" checked="checked"> Crear &nbsp;
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" class="flat" checked="checked"> Leer &nbsp;
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" class="flat" checked="checked"> Actualizar &nbsp;
                                                    </label>
                                                    <label>
                                                        <input type="checkbox" class="flat" checked="checked"> Eliminar &nbsp;
                                                    </label>
                                                </div>
                                                
                                            </div>

                                            </div>

                                        </form>
                                          
                                      </div>
                                    </div>
                                  </div>
                                   -->
                                    
                                </div>
                                <!-- end of accordion -->

                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                      
                    </div>
                    <!-- End SmartWizard Content -->
                    
                  </div>
                </div>
              </div>
    </div>
      
  </div>
</div>
@endsection

@section('script')
    <!-- jQuery Smart Wizard -->
    <script src="{{URL::to('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>
    <script src="{{URL::to('vendors/select2/dist/js/select2.full.min.js')}}"></script>

    <script type="text/javascript">
        
        var contAccordion = 0;
        var cA = 0;
        
        $(document).ready(function() {
            
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            
            $('#wizard').smartWizard({
              transitionEffect: 'slide',
                /* Labels */
                labelPrevious: "Previo", 
                labelNext: "Siguiente",
                labelFinish: "Finalizar"
            });

            $('.buttonNext').addClass('btn btn-success');
            $('.buttonNext').addClass('buttonDisabled');
            $('.buttonPrevious').addClass('btn btn-primary');
            $('.buttonFinish').addClass('btn btn-default');
            
            $(".select2_single").select2({
              placeholder: "Select",
              allowClear: true
            });
            
            //getResources($("#comp").val(),{d:1},1,"sc");
        });
        
        $("form .rol-attr").change(function() {
          //$(this).closest('form').data('changed', true);
            if(($("#rol-name").val() != "") && ($("#rol-description").val() != "")){
                $('.buttonNext').removeClass('buttonDisabled');
                $('.buttonFinish').addClass('buttonDisabled');
            }else{
                $('.buttonNext').addClass('buttonDisabled');
            }
        });
        
        $("#addPermission").click(function(){
            //alert($(this).attr("id"));
            setStorageEvent();
            cA++;
            
            accordion = '<div id="accordionS'+(++contAccordion)+'" class="panel">'
                            +'<a class="panel-heading" role="tab" id="heading'+contAccordion+'" data-toggle="collapse" data-parent="#accordion" href="#collapse'+contAccordion+'" aria-expanded="true" aria-controls="collapse'+contAccordion+'"><span id="close-accordion'+contAccordion+'" class="fa fa-remove close"></span><h4 class="panel-title">Permiso '+contAccordion+'</h4></a>'
                            +'<div id="collapse'+contAccordion+'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'+contAccordion+'">'
                              +'<div class="panel-body">'

                                +'<form class="form-horizontal form-label-left">'

                                    +'<div class="form-group">'

                                    +'<label class="control-label col-md-3 col-sm-3 col-xs-12">Empresa:</label>'
                                    +'<div class="col-md-6 col-sm-6 col-xs-12">'
                                        +'<select id="sc'+contAccordion+'" class="form-control" tabindex="-1">'
                                            +'<option selected value="null">-- Todos --</option>'
                                        +'</select>'
                                    +'</div>'

                                    +'</div>'
                                    +'<div class="form-group">'

                                    +'<label class="control-label col-md-3 col-sm-3 col-xs-12">Unidad de Negocio:</label>'
                                    +'<div class="col-md-6 col-sm-6 col-xs-12">'
                                        +'<select id="sbu'+contAccordion+'" class="form-control" tabindex="-1" disabled="disabled">'
                                            +'<option selected value="null">-- Todos --</option>'
                                        +'</select>'

                                        +'<div class="checkbox">'
                                            +'<label>'
                                                +'<input id="abu'+contAccordion+'" type="checkbox" class="flat" checked="checked"> Atributos'
                                            +'</label>'
                                        +'</div>'

                                    +'</div>'

                                    +'</div>'
                                    +'<div class="form-group">'

                                    +'<label class="control-label col-md-3 col-sm-3 col-xs-12">Proyectos:</label>'
                                    +'<div class="col-md-6 col-sm-6 col-xs-12">'
                                        +'<select id="sp'+contAccordion+'" class="form-control" tabindex="-1" disabled="disabled">'
                                            +'<option selected value="null">-- Todos --</option>'
                                        +'</select>'

                                        +'<div class="checkbox">'
                                            +'<label>'
                                                +'<input id="ap'+contAccordion+'" type="checkbox" class="flat" checked="checked"> Atributos'
                                            +'</label>'
                                        +'</div>'
                
                                        +'<br>'
                                        +'<div class="checkbox btn btn-default">'
                                            +'<label>'
                                                +'<input id="p_create'+contAccordion+'" type="checkbox" class="flat" checked="checked"> Crear &nbsp;'
                                            +'</label>'
                                            +'<label>'
                                                +'<input id="p_read'+contAccordion+'" type="checkbox" class="flat" checked="checked"> Leer &nbsp;'
                                            +'</label>'
                                            +'<label>'
                                                +'<input id="p_update'+contAccordion+'" type="checkbox" class="flat" checked="checked"> Actualizar &nbsp;'
                                            +'</label>'
                                            +'<label>'
                                                +'<input id="p_delete'+contAccordion+'" type="checkbox" class="flat" checked="checked"> Eliminar &nbsp;'
                                            +'</label>'
                                        +'</div>'

                                    +'</div>'

                                    +'</div>'

                                +'</form>'

                              +'</div>'
                            +'</div>'
                          +'</div>';
            
            // adding elements and event to remove item
            $("#accordion").append(accordion);
            var ca = 0 + contAccordion;
            $("#close-accordion"+ca).click(function(){
                cA--;
                $("#accordionS"+ca).remove();
                
                if(cA == 0){
                    $('.buttonFinish').addClass('buttonDisabled');
                }
            });
            
            // adding events to change and get options
            
            getResources($("#comp").val(),{d:1},1,("sc"+contAccordion));
            
            $('#sc'+contAccordion).change(function (){
                //alert('#sc'+ca);
                if($(this).val == "null"){
                    $("#sbu"+ca).prop("disabled",true);
                    $("#sbu"+ca).html('<option selected value="null">-- Todos --</option>');
                    $("#sp"+ca).html('<option selected value="null">-- Todos --</option>');
                }else{
                    getResources($("#busuni").val(),{id:$(this).val()},2,("sbu"+ca));
                    $("#sp"+ca).html('<option selected value="null">-- Todos --</option>');
                }
            });
            
            $('#sbu'+contAccordion).change(function (){
                
                if($(this).val == "null"){
                    $("#sp"+ca).prop("disabled",true);
                    $("#sp"+ca).html('<option selected value="null">-- Todos --</option>');
                }else{
                    getResources($("#propmo").val(),{id:$(this).val()},3,("sp"+ca));
                }
                
            });
            
        });
        
        function insertCompanies(datos,elemento){
            
            options = "<option selected value='null'>-- Todos --</option>";
            
            for(i = 0; i < datos.length; i++){
                options += "<option value="+datos[i]["id"]+">"+datos[i]["name"]+"</option>";
            }
            
            $("#"+elemento).html(options);
        }
        
        function insertBusinessUnit(datos,elemento){
            
            options = "<option selected value='null'>-- Todos --</option>";
            
            for(i = 0; i < datos.length; i++){
                options += "<option value="+datos[i]["id"]+">"+datos[i]["name"]+"</option>";
            }
            
            $("#"+elemento).html(options);
            $("#"+elemento).prop("disabled",false);
        }
        
        function insertProjects(datos,elemento){
            
            options = "<option selected value=null>-- Todos --</option>";
            
            for(i = 0; i < datos.length; i++){
                options += "<option value="+datos[i]["id"]+">"+datos[i]["name"]+"</option>";
            }
            
            $("#"+elemento).html(options);
            $("#"+elemento).prop("disabled",false);
        }
        
        function getResources(url, data, attr, element){
            //alert(url+" "+data+" "+attr+" "+element);
            token = {_token: $('meta[name=_token]').attr('content')};
            
            data = collect(token, data);
            
            $.ajax({
                url: url,
                type: "POST",
                data: data,
                dataType: "json"
            }).done(function(data){
                console.log(data);
                switch(attr){
                    case 1:
                        insertCompanies(data,element);
                    break;
                    case 2:
                        insertBusinessUnit(data,element);
                    break;
                    case 3:
                        insertProjects(data,element);
                    break;
                }
            }).fail(function(data){
                console.log(data);    
            });
          
        }
        
        function setStorageEvent(){
            $('.buttonFinish').removeClass('buttonDisabled');
            $('.buttonFinish').click(function(){
                //alert("aaa");
                doPost();
            });
        }
        
        function doPost(){//alert(cA);
            
            token = {_token: $('meta[name=_token]').attr('content')};
                          
            data={cantElements: cA, cE: contAccordion, rolName : $("#rol-name").val(), rolDescription : $("#rol-description").val()};
            
            data = collect(token, data);
            
            for(i = 0; i <= contAccordion; i++){
                
                if($("#sc"+i).length){
                    data["sc"+i] = $("#sc"+i).val();
                    
                    data["p_create"+i] = $("#p_create"+i).prop('checked');
                    data["p_read"+i] = $("#p_read"+i).prop('checked');
                    data["p_update"+i] = $("#p_update"+i).prop('checked');
                    data["p_delete"+i] = $("#p_delete"+i).prop('checked');
                }
                
                if($("#sbu"+i).length){
                    data["sbu"+i] = $("#sbu"+i).val();
                    data["abu"+i] = $("#abu"+i).prop('checked');
                }
                
                if($("#sp"+i).length){
                    data["sp"+i] = $("#sp"+i).val();
                    data["ap"+i] = $("#ap"+i).prop('checked');
                }
                
            }
            
            console.log(data);
            
            post("{{URL::to('pmo-admin/saveNewRol')}}",data);
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
        
        function post(path, params, method) {
            method = method || "post"; // Set method to post by default if not specified.

            // The rest of this code assumes you are not using a library.
            // It can be made less wordy if you use one.
            var form = document.createElement("form");
            form.setAttribute("method", method);
            form.setAttribute("action", path);

            for(var key in params) {
                if(params.hasOwnProperty(key)) {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    hiddenField.setAttribute("value", params[key]);

                    form.appendChild(hiddenField);
                 }
            }

            document.body.appendChild(form);
            form.submit();
        }
        
    </script>
@endsection