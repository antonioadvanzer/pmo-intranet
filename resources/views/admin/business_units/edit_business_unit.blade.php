@extends('layout.admin.adminLayout')

@section('content')

<div class="right_col" role="main">
  <div class="">
    
    <div class="page-title">
        <div class="title_left">
        <!--<h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>-->
          <h3>Unidades de Negocio <small></small></h3>
        </div>
    </div>

    <div class="clearfix"></div>
      
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar Unidad de Negocio <small></small></h2>
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
                          action="{{ URL::to('pmo-admin/updateBusinessUnit/'.$business_unit->id) }}">
                        
                        <input name="_token" type="hidden" value="{!! csrf_token() !!}"/>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bu-name">Nombre <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="bu-name" name="bu-name" type="text" required="required" class="form-control col-md-7 col-xs-12" value="{{ $business_unit->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bu-company">Empresa</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="bu-company" name="bu-company" class="form-control" required="required">
                                
                                @foreach($companies as $co)
                                  <option value="{{ $c = $co->id }}" {{ ($c == $business_unit->company)? 'selected' : ''}} >{{ $co->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bu-descripion">Descripci&oacute;n <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea id="bu-description" name="bu-description" class="form-control col-md-7 col-xs-12 rol-attr">{{ $business_unit->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bu-icon">Icono <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="bu-icon" name="bu-icon" type="text" required="required" class="form-control col-md-7 col-xs-12" placeholder="fa icon" value="{{ $business_unit->icon }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Atributos </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php $attributes2 = $business_unit->getAttributesValues()->get();?>
                                @foreach($attributes as $attr1)
                                
                                    @foreach($attributes2 as $attr2)
                                        
                                        @if($attr2->getBusinessUnitAttributeAssociated()->first()->id == $attr1->id)
                                        <div class="checkbox">
                                            <label class="btn  btn-default">
                                                <input name="{{$attr1->id }}" type="checkbox" class="display-alert" checked="checked"> {{ $attr1->name }}
                                            </label>
                                        </div>
                                        <?php unset($attr1)?>
                                        @break
                                        @endif
                                        
                                    @endforeach
                                
                                    @if(isset($attr1))
                                    <div class="checkbox">
                                        <label>
                                            <input name="{{$attr1->id }}" type="checkbox" class="" > {{ $attr1->name }}
                                        </label>
                                    </div>
                                    @endif
                                
                                @endforeach
                                
                                <br/>
                                
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!--<button type="submit" class="btn btn-primary">Cancelar</button>-->
                            <a href="{{ URL::to('pmo-admin/business_units') }}" class="btn btn-primary">Cancelar</a>
                          <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                      </div>

                    </form>
                      
                      <div class="cd-popup" role="alert">
                        <div class="cd-popup-container">
                            <br><h4>Si desmarca este atributo, los archivos seran eliminados<br>¿Estas seguro de quitar este elemento?</h4>
                            <ul class="cd-buttons">
                                <li><a href="#0" class="accept">Si</a></li>
                                <li><a href="#0" class="close-alert">No</a></li>
                            </ul>
                            <a href="#0" class="cd-popup-close img-replace">Close</a>
                        </div> <!-- cd-popup-container -->
                    </div> <!-- cd-popup -->

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
            
        });
        
        var check = null;
        
        jQuery(document).ready(function($){
            
            $('.display-alert').change(function(event){
                if(!$(this).is(':checked')) {  
                    event.preventDefault();
                    $('.cd-popup').addClass('is-visible');
                    check = $(this);  
                }
            });
            
            //open popup
            /*$('.cd-popup-trigger').on('click', function(event){
                event.preventDefault();
                $('.cd-popup').addClass('is-visible');
            });*/

            //close popup
            $('.cd-popup').on('click', function(event){
                /*if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') || $(event.target).is('.close-alert') ) {
                    event.preventDefault();
                    $(this).removeClass('is-visible');
                }*/
                if($(event.target).is('.cd-popup-close') || $(event.target).is('.close-alert')) {
                    check.prop('checked', true);
                    event.preventDefault();
                    $(this).removeClass('is-visible');
                }else if($(event.target).is('.accept')) {
                    event.preventDefault();
                    $(this).removeClass('is-visible');
                }
            });
            
            //close popup when clicking the esc keyboard button
            /*$(document).keyup(function(event){
                if(event.which=='27'){
                    $('.cd-popup').removeClass('is-visible');
                }
            });*/
        });
        
    </script>
@endsection