<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>{{ config('app.name', 'Colfecar | Sistema de gestion empresarial') }}</title>

    <!-- Styles -->

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <!-- Dashboard 1 Page CSS -->
    
    @yield('css')


</head>

<body class="skin-blue fixed-layout">
<div id="log-in">
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

    <header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo  /images/logo-light-icon.png   -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            <!-- Logo icon --><b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon           logo-icon.png          -->
                                <img src="{{ Storage::disk('public')->url('images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="{{ Storage::disk('public')->url('images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text --><span>
                             <!-- dark Logo text -->
                             <img src="{{ Storage::disk('public')->url('images/logo-text.png') }}" alt="homepage" class="dark-logo" />
                             <!-- Light Logo text -->    
                             <img src="{{ Storage::disk('public')->url('images/logo-light-text.png') }}" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
            

                <div class="navbar-collapse">
                        <!-- ============================================================== -->
                        <!-- toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav mr-auto">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                            <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <li class="nav-item">
                                <form class="app-search d-none d-md-block d-lg-block">
                                    <input type="text" class="form-control" placeholder="Buscar Contenido">
                                </form>
                            </li>
                        </ul>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav my-lg-0">
                            <!-- ============================================================== -->
                            <!-- Comment -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                    <ul>
                                        <li>
                                            <div class="drop-title">Notificaciones</div>
                                        </li>
                                        <li>
                                            <div class="message-center">
                                                <!-- Message -->
                                                <a href="javascript:void(0)">
                                                    <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="javascript:void(0)">
                                                    <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="javascript:void(0)">
                                                    <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="javascript:void(0)">
                                                    <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End Comment -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- Messages -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                                </a>
                                <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                    <ul>
                                        <li>
                                            <div class="drop-title">You have 4 new messages</div>
                                        </li>
                                        <li>
                                            <div class="message-center">
                                                <!-- Message -->
                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="{{ Storage::disk('public')->url('images/users/1.jpg') }}" alt="user" class="img-circle">  <span class="profile-status online pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="{{ Storage::disk('public')->url('images/users/2.jpg') }}" alt="user" class="img-circle">  <span class="profile-status busy pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="{{ Storage::disk('public')->url('images/users/3.jpg') }}" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                                </a>
                                                <!-- Message -->
                                                <a href="javascript:void(0)">
                                                    <div class="user-img"> <img src="{{ Storage::disk('public')->url('images/users/4.jpg') }}" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                    <div class="mail-contnet">
                                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End Messages -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- mega menu -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-layout-width-default"></i></a>
                                <div class="dropdown-menu animated bounceInDown">
                                    <ul class="mega-dropdown-menu row">
                                        <li class="col-lg-3 col-xlg-2 m-b-30">
                                            <h4 class="m-b-20">CAROUSEL</h4>
                                            <!-- CAROUSEL -->
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="carousel-item active">
                                                        <div class="container"> <img class="d-block img-fluid" src="{{ Storage::disk('public')->url('images/big/img1.jpg') }}" alt="First slide"></div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="container"><img class="d-block img-fluid" src="{{ Storage::disk('public')->url('images/big/img2.jpg') }}" alt="Second slide"></div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="container"><img class="d-block img-fluid" src="{{ Storage::disk('public')->url('images/big/img3.jpg') }}" alt="Third slide"></div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                            </div>
                                            <!-- End CAROUSEL -->
                                        </li>
                                        <li class="col-lg-3 m-b-30">
                                            <h4 class="m-b-20">ACCORDION</h4>
                                            <!-- Accordian -->
                                            <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingOne">
                                                        <h5 class="mb-0">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                      Collapsible Group Item #1
                                                    </a>
                                                  </h5> </div>
                                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                      Collapsible Group Item #2
                                                    </a>
                                                  </h5> </div>
                                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingThree">
                                                        <h5 class="mb-0">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                      Collapsible Group Item #3
                                                    </a>
                                                  </h5> </div>
                                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-lg-3  m-b-30">
                                            <h4 class="m-b-20">CONTACT US</h4>
                                            <!-- Contact -->
                                            <form>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Enter email"> </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </form>
                                        </li>
                                        <li class="col-lg-3 col-xlg-4 m-b-30">
                                            <h4 class="m-b-20">List style</h4>
                                            <!-- List style -->
                                            <ul class="list-style-none">
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                                <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End mega menu -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- User Profile -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown u-pro">
                                @guest

                                @else
                                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ Storage::disk('public')->url(Auth::user()->avtr) }}" alt="user" class=""> <span class="hidden-md-down">{{ Auth::user()->name }} {{ Auth::user()->last_name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                                @endguest
                                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                    <!-- text-->
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                    <!-- text-->
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                                    <!-- text-->
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                    <!-- text-->
                                    <div class="dropdown-divider"></div>
                                    <!-- text-->
                                    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                    <!-- text-->
                                    <div class="dropdown-divider"></div>
                                    <!-- text-->
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Salir</a>
                                    <!-- text-->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- End User Profile -->
                            <!-- ============================================================== -->
                            {{-- <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li> --}}
                        </ul>
                    
                    </div>
        </nav>
    </header>
    

    <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                            @guest

                            @else
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{ Storage::disk('public')->url(Auth::user()->avtr) }}" alt="user-img" class="img-circle"><span class="hide-menu">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span></a>
                            @endguest
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> Mi perfil</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> Mi Historial</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Buzon</a></li>
                                <li><a href="register"><i class="ti-settings"></i> Configuración de cuenta</a></li>
                                
                            </ul>
                        </li>

                        @can('affiliations.index')
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-notebook"></i><span class="hide-menu">Afiliaciones </span></a>
                            <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('affiliations.index') }}"> Afiliaciones </a></li>
                            <li><a href="{{ route('id_types.index') }}"> Tipos de Identificacion  </a></li>
                             </ul>
                        </li>
                        @endcan
                        @can('guild-argumentation.index')
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-book-open"></i><span class="hide-menu">Argumentación Gremial </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#"> opcion 1  </a></li>
                             </ul>
                        </li>
                        @endcan
                        @can('business-str.index')
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-flag"></i><span class="hide-menu">Fortalecimiento Empresarial </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#"> opcion 1  </a></li>
                             </ul>
                        </li>
                        @endcan
                        @can('divulgation.index')
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-paper-plane"></i><span class="hide-menu">Divulgación </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('divulgation.index') }}"> Panel de control  </a></li>
                                <li><a href="{{ route('events.index') }}"> Eventos </a></li>
                                <li><a href="{{ route('event_types.index') }}"> Configurar los tipos de evento </a></li>
                             </ul>
                        </li>
                        @endcan
                        @can('logistical-support.index')
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-bubble"></i><span class="hide-menu">Apoyo Logistico </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#"> opcion 1  </a></li>
                             </ul>
                        </li>
                        @endcan
                        @can('users.index')
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Usuarios </span></a>
                            <ul aria-expanded="false" class="collapse">
                            @can('users.create')
                            <li><a href={{ route('users.create') }}> Nuevo Usuario  </a></li>
                            @endcan
                            @can('users.create')
                            <li><a href={{ route('users.index') }}> Permisos Usuarios  </a></li>
                            @endcan
                             </ul>
                        </li>
                        @endcan
                        @can('role.index')
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-bubble"></i><span class="hide-menu">Configuracion </span></a>
                            <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ route('roles.index') }}"> Roles  </a></li>
                            <li><a href="{{ route('company_states.index') }}"> Estados de empreesas  </a></li>
                            <li><a href="{{ route('company_types.index') }}"> Tipos de empreesas  </a></li>
                             </ul>
                        </li>
                        @endcan
  
                
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>


  
        {{-- <main class="py-4"> --}}
                <div id="log-in">
            @yield('content')
        </div>
        {{-- </main> --}}
    </div>
</div>

</div>

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src=""></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <!-- This is data table -->
    <script src="{{ asset('/node_modules/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('node_modules/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('node_modules/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('node_modules/multiselect/js/jquery.multi-select.js') }}"></script>
    <script>
            jQuery(document).ready(function() {
                // Switchery
                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                $('.js-switch').each(function() {
                    new Switchery($(this)[0], $(this).data());
                });
                // For select 2
                $(".select2").select2();
                $('.selectpicker').selectpicker();
                //Bootstrap-TouchSpin
                $(".vertical-spin").TouchSpin({
                    verticalbuttons: true,
                    verticalupclass: 'ti-plus',
                    verticaldownclass: 'ti-minus'
                });
                var vspinTrue = $(".vertical-spin").TouchSpin({
                    verticalbuttons: true
                });
                if (vspinTrue) {
                    $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
                }
                $("input[name='tch1']").TouchSpin({
                    min: 0,
                    max: 100,
                    step: 0.1,
                    decimals: 2,
                    boostat: 5,
                    maxboostedstep: 10,
                    postfix: '%'
                });
                $("input[name='tch2']").TouchSpin({
                    min: -1000000000,
                    max: 1000000000,
                    stepinterval: 50,
                    maxboostedstep: 10000000,
                    prefix: '$'
                });
                $("input[name='tch3']").TouchSpin();
                $("input[name='tch3_22']").TouchSpin({
                    initval: 40
                });
                $("input[name='tch5']").TouchSpin({
                    prefix: "pre",
                    postfix: "post"
                });
                // For multiselect
                $('#pre-selected-options').multiSelect();
                $('#optgroup').multiSelect({
                    selectableOptgroup: true
                });
                $('#public-methods').multiSelect();
                $('#select-all').click(function() {
                    $('#public-methods').multiSelect('select_all');
                    return false;
                });
                $('#deselect-all').click(function() {
                    $('#public-methods').multiSelect('deselect_all');
                    return false;
                });
                $('#refresh').on('click', function() {
                    $('#public-methods').multiSelect('refresh');
                    return false;
                });
                $('#add-option').on('click', function() {
                    $('#public-methods').multiSelect('addOption', {
                        value: 42,
                        text: 'test 42',
                        index: 0
                    });
                    return false;
                });
                $(".ajax").select2({
                    ajax: {
                        url: "https://api.github.com/search/repositories",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function(data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    }, // let our custom formatter work
                   
                });
            });
            </script>
    @yield('script')







</body>
</html>