<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <title>Panel de Administracion PMO | </title>

    <!-- Bootstrap -->
    <link href="{{ URL::to('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::to('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::to('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/> 
    <!-- bootstrap-progressbar -->
    <link href="{{ URL::to('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
      
    <!-- Custom Theme Style -->
    <!--<link href="{{ URL::to('build/css/custom.min.css') }}" rel="stylesheet">-->
    <link href="{{ URL::to('build/css/custom.css') }}" rel="stylesheet">
      
    <!-- Custom Admin -->
    <link rel="stylesheet" href="{{ URL::to('css/admin/custom.css') }}">
      
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ URL::to('') }}" class="site_title"><i class="fa fa-briefcase"></i> <span>PMO Intranet Advanzer</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="http://www.iconsfind.com/wp-content/uploads/2015/08/20150831_55e46b18e2a80.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{{ AdvEnt::getCurrentUser()['name']." ".AdvEnt::getCurrentUser()['lastname']}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                      <li><a><i class="fa fa-home"></i> Principal <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Menu</a></li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ URL::to('pmo-admin/users') }}">Todos los Usuarios</a></li>
                            <li><a href="{{ URL::to('pmo-admin/newUser') }}">Nuevo Usuario</a></li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-low-vision"></i> Roles <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ URL::to('pmo-admin/roles') }}">Todos los Roles</a></li>
                            <li><a href="{{ URL::to('pmo-admin/newRol') }}">Nuevo Rol</a></li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-briefcase"></i> Unidades de Negocio <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{ URL::to('pmo-admin/business_units') }}">Todas las Unidad de Negocio</a></li>
                          <li><a href="{{ URL::to('pmo-admin/newBusinessUnit') }}">Nueva Unidad de Negocio</a></li>
                          <li><a href="#">Atributos</a>
                            <ul class="nav child_menu">
                                 <li><a href="{{ URL::to('pmo-admin/business_units_attributes') }}">Todos los Atributos</a></li>
                                <li><a href="{{ URL::to('pmo-admin/newBusinessUnitAttribute') }}">Nuevo Atributo</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li><a><i class="fa fa-folder-open"></i> Proyetos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{ URL::to('pmo-admin/projects') }}">Todos los Proyectos</a></li>
                          <li><a href="{{ URL::to('pmo-admin/newProject') }}">Nuevo Proyecto</a></li>
                          <li><a href="#">Atributos</a>
                            <ul class="nav child_menu">
                                <li><a href="{{ URL::to('pmo-admin/projects_attributes') }}">Todos los Atributos</a></li>
                                <li><a href="{{ URL::to('pmo-admin/newProjectAttribute') }}">Nuevo Atributo</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                        <li><a><i class="fa fa-th-large"></i> PMO <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ URL::to('pmo-admin/pmo_templates') }}">Todas las plantillas</a></li>
                            <li><a href="{{ URL::to('pmo-admin/newPMOTemplate') }}">Nueva Plantilla</a></li>
                        </ul>
                      </li>
                    </ul>
                </div>
                
              <!--<div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html">General Elements</a></li>
                      <li><a href="media_gallery.html">Media Gallery</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="glyphicons.html">Glyphicons</a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>
                </ul>
              </div>-->
              <!--<div class="menu_section">
            
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>-->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="http://www.iconsfind.com/wp-content/uploads/2015/08/20150831_55e46b18e2a80.png" alt="">{{ AdvEnt::getCurrentUser()['name']." ".AdvEnt::getCurrentUser()['lastname']}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <!--<span class="badge bg-red pull-right">50%</span>-->
                        <span>Ajustes</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="{{ URL::to('companies') }}">Modo Empleado</a></li>
                    <li><a href="{{ URL::to('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesi&oacute;n</a></li>
                  </ul>
                </li>

                <!--<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Melissa Valdes</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Melissa Valdes</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Melissa Valdes</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Melissa Valdes</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>-->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <!--<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>
              </div>
            </div>
          </div>
        </div>-->
          
          @yield('content')
          
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <!--Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>-->
              Advanzer S.A de C.V
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{URL::to('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{URL::to('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{URL::to('vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{URL::to('vendors/nprogress/nprogress.js') }}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{URL::to('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      
    @yield('script')
      
    <!-- Custom Theme Scripts -->
    <script src="{{URL::to('build/js/custom.min.js') }}"></script>
      
  </body>
</html>