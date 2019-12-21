<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('themes/back/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('themes/back/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('themes/back/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('themes/back/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('themes/back/css/skins/_all-skins.min.css') }}">
    @yield('additionalCSS')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">SI</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Safe</b>Int.</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('themes/back/img/avatar.png') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign out</a>
                                </div>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
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
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>

                <?php
                    $subMenu = ['menu_content', 'menu_content_details', 'submenu_content', 'submenu_content_details'];
                ?>

                <li class="treeview {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-circle-o text-red"></i> <span>Page Content</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                        <li class="{{ Route::currentRouteName() == 'menu_content' ? 'active' : '' }}">
                            <a href="{{ route('menu_content') }}"><i class="fa fa-circle-o"></i> Menu Content</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'submenu_content' ? 'active' : '' }}">
                            <a href="{{ route('submenu_content') }}"><i class="fa fa-circle-o"></i> Sub Menu Content</a>
                        </li>
                    </ul>
                </li>

                <?php
                    $subMenu = ['add_project', 'admin_all_project', 'edit_project'];
                ?>

                {{--<li class="treeview {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-circle-o text-red"></i> <span>Project</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                        <li class="{{ Route::currentRouteName() == 'add_project' ? 'active' : '' }}">
                            <a href="{{ route('add_project') }}"><i class="fa fa-circle-o"></i> Add Project</a>
                        </li>

                        <li class="{{ Route::currentRouteName() == 'admin_all_project' ? 'active' : '' }}">
                            <a href="{{ route('admin_all_project') }}"><i class="fa fa-circle-o"></i> All Projects</a>
                        </li>
                    </ul>
                </li>--}}

                <?php
                    $subMenu = ['add_news', 'admin_all_news', 'edit_news'];
                ?>

                <li class="treeview {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-circle-o text-red"></i> <span>News</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                        <li class="{{ Route::currentRouteName() == 'add_news' ? 'active' : '' }}">
                            <a href="{{ route('add_news') }}"><i class="fa fa-circle-o"></i> Add News</a>
                        </li>

                        <li class="{{ Route::currentRouteName() == 'admin_all_news' ? 'active' : '' }}">
                            <a href="{{ route('admin_all_news') }}"><i class="fa fa-circle-o"></i> All News</a>
                        </li>
                    </ul>
                </li>

                <?php
                    $subMenu = ['add_say', 'admin_all_say', 'edit_say'];
                ?>

                <li class="treeview {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-circle-o text-red"></i> <span>Client Say</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                        <li class="{{ Route::currentRouteName() == 'add_say' ? 'active' : '' }}">
                            <a href="{{ route('add_say') }}"><i class="fa fa-circle-o"></i> Add Say</a>
                        </li>

                        <li class="{{ Route::currentRouteName() == 'admin_all_say' ? 'active' : '' }}">
                            <a href="{{ route('admin_all_say') }}"><i class="fa fa-circle-o"></i> All Says</a>
                        </li>
                    </ul>
                </li>

                <?php
                    $subMenu = ['add_slider', 'admin_all_slider', 'edit_slider'];
                ?>

                <li class="treeview {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-circle-o text-red"></i> <span>Slider</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                        <li class="{{ Route::currentRouteName() == 'add_slider' ? 'active' : '' }}">
                            <a href="{{ route('add_slider') }}"><i class="fa fa-circle-o"></i> Add Slider</a>
                        </li>

                        <li class="{{ Route::currentRouteName() == 'admin_all_slider' ? 'active' : '' }}">
                            <a href="{{ route('admin_all_slider') }}"><i class="fa fa-circle-o"></i> All Slider</a>
                        </li>
                    </ul>
                </li>
                <?php
                $subMenu = ['add_project', 'admin_all_project', 'edit_project'];
                ?>

                <li class="treeview {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-circle-o text-red"></i> <span>Project</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                        <li class="{{ Route::currentRouteName() == 'add_project' ? 'active' : '' }}">
                            <a href="{{ route('add_project') }}"><i class="fa fa-circle-o"></i> Add Project</a>
                        </li>

                        <li class="{{ Route::currentRouteName() == 'admin_all_project' ? 'active' : '' }}">
                            <a href="{{ route('admin_all_project') }}"><i class="fa fa-circle-o"></i> All Projects</a>
                        </li>
                    </ul>
                </li>

                <?php
                    $subMenu = ['add_gallery_item', 'admin_all_gallery_item', 'edit_gallery_item'];
                ?>

                <li class="treeview {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-circle-o text-red"></i> <span>Gallery</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                        <li class="{{ Route::currentRouteName() == 'add_gallery_item' ? 'active' : '' }}">
                            <a href="{{ route('add_gallery_item') }}"><i class="fa fa-circle-o"></i> Add Image</a>
                        </li>

                        <li class="{{ Route::currentRouteName() == 'admin_all_gallery_item' ? 'active' : '' }}">
                            <a href="{{ route('admin_all_gallery_item') }}"><i class="fa fa-circle-o"></i> All Images</a>
                        </li>
                    </ul>
                </li>


                <?php
                $subMenu = ['add.machine.form','all.machine','machine.client'];
                ?>

                <li class="treeview {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-circle-o text-red"></i> <span>Machine</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                        <li class="{{ Route::currentRouteName() == 'add.machine.form' ? 'active' : '' }}">
                            <a href="{{ route('add.machine.form') }}"><i class="fa fa-circle-o"></i> Add Machine</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'all.machine' ? 'active' : '' }}">
                            <a href="{{ route('all.machine') }}"><i class="fa fa-circle-o"></i> All Machine</a>
                        </li>

                    </ul>
                </li>

            <?php
                $subMenu = ['add.client.form','all.client','edit.client'];
                ?>

                <li class="treeview {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-circle-o text-red"></i> <span>Client</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu {{ in_array(Route::currentRouteName(), $subMenu) ? 'active menu-open' : '' }}">
                        <li class="{{ Route::currentRouteName() == 'add.client.form' ? 'active' : '' }}">
                            <a href="{{ route('add.client.form') }}"><i class="fa fa-circle-o"></i> Add Client</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'all.client' ? 'active' : '' }}">
                            <a href="{{ route('all.client') }}"><i class="fa fa-circle-o"></i> All Client</a>
                        </li>

                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Hotline</b> 01884-697775
        </div>
        <strong>Developed by <a target="_blank" href="http://2aitbd.com">2A IT</a></strong>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('themes/back/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('themes/back/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('themes/back/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('themes/back/js/adminlte.min.js') }}"></script>

<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
@yield('additionalJS')
</body>
</html>
