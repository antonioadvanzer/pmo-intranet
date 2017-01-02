@extends('layout.admin.adminLayout')

@section('content')

<div class="right_col" role="main">
  <div class="">
    
    <div class="page-title">
        <div class="title_left">
        <!--<h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>-->
          <h3>PMO <small></small></h3>
        </div>
    </div>

    <div class="clearfix"></div>
      
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nueva Plantilla <small></small></h2>
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
                                  <small>Plantilla</small>
                              </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                  Paso 2<br />
                                  <small>Colocar Atributos</small>
                              </span>
                          </a>
                        </li>
                        
                      </ul>
                      <div id="step-1">
                          
                        <form class="form-horizontal form-label-left">
                            <p>
                              Nombre a la Plantilla 
                            </p>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="template-name">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="template-name" name="template-name" required="required" class="form-control col-md-7 col-xs-12 rol-attr">
                            </div>
                          </div>
                        </form>

                      </div>
                        <div id="step-2">
                            
                            <h2 class="StepTitle">Agregar Atributos</h2>
                            <p>
                              
                            </p>
                            
                            <a id="addPermission" class="btn btn-default">Agregar</a>
                            <br><br>
                            
                            <div class="form-group">
                                
                                <!-- start accordion -->
                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                    
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
            
            setStorageEvent();
        });
        
        $("form .rol-attr").change(function() {
            if(($("#template-name").val() != "")){
                $('.buttonNext').removeClass('buttonDisabled');
                $('.buttonFinish').addClass('buttonDisabled');
            }else{
                $('.buttonNext').addClass('buttonDisabled');
            }
        });
        
        $("#addPermission").click(function(){
            //alert($(this).attr("id"));
            //setStorageEvent();
            cA++;
            
            accordion = '<div id="accordionS'+(++contAccordion)+'" class="panel">'
                            +'<a class="panel-heading" role="tab" id="heading'+contAccordion+'" data-toggle="collapse" data-parent="#accordion" href="#collapse'+contAccordion+'" aria-expanded="true" aria-controls="collapse'+contAccordion+'"><span id="close-accordion'+contAccordion+'" class="fa fa-remove close"></span><h4 class="panel-title">Atributo '+contAccordion+'</h4></a>'
                            +'<div id="collapse'+contAccordion+'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'+contAccordion+'">'
                              +'<div class="panel-body">'

                                +'<form class="form-horizontal form-label-left">'

                                    +'<div class="form-group">'

                                    +'<label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre:</label>'
                                    +'<div class="col-md-6 col-sm-6 col-xs-12">'
                                        +'<input type="text" id="attrN'+contAccordion+'" name="rol-name" required="required" class="form-control col-md-7 col-xs-12 rol-attr">'
                                    +'</div>'

                                    +'</div>'
                                    +'<div class="form-group">'

                                    +'<label class="control-label col-md-3 col-sm-3 col-xs-12">Icono:</label>'
                                    +'<div class="col-md-6 col-sm-6 col-xs-12">'
                                        +'<input type="text" id="attrI'+contAccordion+'" name="rol-name" required="required" placeholder="fa icon" class="form-control col-md-7 col-xs-12 rol-attr">'

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
            $('.buttonFinish').removeClass('buttonDisabled');
        });
        
        function setStorageEvent(){
            //$('.buttonFinish').removeClass('buttonDisabled');
            $('.buttonFinish').click(function(){
                if(cA != 0){
                    //alert("asdasd "+cA);
                    doPost();
                }
            });
        }
        
        function doPost(){//alert(cA);
            
            token = {_token: $('meta[name=_token]').attr('content')};
                          
            data={cantElements: cA, cE: contAccordion, templateName : $("#template-name").val()};
            
            data = collect(token, data);
            
            for(i = 0; i <= contAccordion; i++){
                
                if($("#attrN"+i).length){
                    data["attrN"+i] = $("#attrN"+i).val();
                    
                }
                
                if($("#attrI"+i).length){
                    data["attrI"+i] = $("#attrI"+i).val();
                }
                
            }
            
            console.log(data);
            
            post("{{URL::to('pmo-admin/saveNewPMOTemplate')}}",data);
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