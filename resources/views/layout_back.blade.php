<!DOCTYPE html>
<html lang="fr">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <title>Gestion Budget</title>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ url('css/bootstrap-4.1.3.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('css/AdminLTE-2.4.5.min.css') }}">
        <!-- AdminLTE Skins. Le choix du skin par defaut est bleu.
            On peu le changer par d'autres skin, vérifiez bien d'appliquer la classe du skin, au tag Body pour que ça prenne effet
        -->
        <link rel="stylesheet" href="{{url('css/skins/skin-' . Auth::user()->color_theme . '.min.css') }}">

        <link rel="stylesheet" href="{{url('css/style_back.css') }}" >
        
        @yield('css')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-{{ Auth::user()->color_theme }} sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="{{ route("dashboard") }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">P<b>B</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">PRÉVI<b>BUDGET</b></span>
                </a>


                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Menu déroulant</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="{{url('img/profil-default.png') }}" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">{{Auth::user()->nom }} {{Auth::user()->prenom }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="{{url('img/profil-default.png') }}" class="img-circle" alt="User Image">

                                        <p>
                                            {{Auth::user()->nom}}&nbsp {{Auth::user()->prenom}}
                                            <small>Inscrit le : {{Auth::user()->created_at->format('d/m/Y')}}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Se déconnecter</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{url('img/profil-default.png') }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{Auth::user()->nom}}&nbsp {{Auth::user()->prenom}}</p>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">Menu principal</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li class="treeview">
                            <a href="#"><i class="fa fa-list-alt"></i> <span>Comptes</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route("compte.create") }}">Ajouter</a></li>
                                <li><a href="{{ route("compte.index") }}">Administrer</a></li>
                            </ul>	

                        </li>

                        <li class="treeview">
                            <a href="{{ route("dashboard") }}"><i class="fa fa-picture-o"></i> <span>Mono Link TODO</span>  </a>
                        </li>


                        <li class="header">Séparation</li>

                        <li class="treeview">
                            <a href="{{ route("dashboard") }}"><i class="fa fa-picture-o"></i> <span>Mono Link TODO</span>  </a>
                        </li>

                    </ul>
                    <!-- /.sidebar-menu -->

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('title')
                </section>

                <!-- Main content -->
                <section class="content">

                    @if(Session::has('error'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <center><strong>Erreur : </strong> {{Session::get('error')}}</center>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Session::has('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <center><strong>Succès : </strong> {{Session::get('success')}}</center>
                            </div>
                        </div>
                    </div>
                    @endif

                    @yield('content')

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Footer -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    Prévibudget
                </div>
                <strong>Copyright &copy; 2018 <a href="{{ route("dashboard") }}">Ikikay</a>.</strong> tous droits reservés.
            </footer>

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3.3.1 -->
        <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
        <!-- Bootstrap 4.1.3 -->
        <script src="{{ url('js/bootstrap-4.1.3.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('js/adminlte-2.4.5.min.js') }}"></script>

        @yield('script')

    </body>
</html>