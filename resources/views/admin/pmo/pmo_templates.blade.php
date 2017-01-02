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
                    <h2>Relaci&oacute;n de Plantillas de PMO <small></small></h2>
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
                    
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                      
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Atributos</th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pmo_templates as $pt)
                        <tr>
                            <td>{{ $pt->name }}</td>
                            <td>
                            <?php $attr = $pt->getPmoAttribute()->get()?>
                                <ul type="1">
                                @foreach($attr as $a)
                                <li>{{ $a->name }}</li>
                                @endforeach
                                </ul>
                            </td>
                            <td><i class="fa fa-cog" aria-hidden="true"></i></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
    </div>
      
  </div>
</div>
@endsection

@section('script')
    <!-- Datatables -->
    <script src="{{URL::to('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{URL::to('vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
    <script src="{{URL::to('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{URL::to('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{URL::to('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {

        $('#datatable-responsive').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });

      });
    </script>
@endsection