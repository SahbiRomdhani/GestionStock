<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}>
    <link rel="stylesheet" href={{asset('AdminLTE/bower_components/font-awesome/css/all.min.css')}}>

  <!-- Ionicons -->
  <link rel="stylesheet" href={{asset('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset('AdminLTE/dist/css/AdminLTE.min.css')}}>
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href={{asset('AdminLTE/dist/css/skins/skin-blue.min.css')}}>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

 
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu " style="margin-left: 800px; float:right">
        <ul class="nav navbar-nav">
         

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="far fa-bell"></i>
              @if (count(Auth::user()->unreadNotifications))
                  
            <span class="label label-warning">{{ auth()->user()->unreadNotifications()->count()}} </span>
            @endif
            </a>
            <ul class="dropdown-menu">
              <li class="header">
                You have {{ count(Auth::user()->unreadNotifications)}} notifications 

                 <a href="{{route('maskasread')}}" id="markread"> Mark as Read</a>
              
              </li>

              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    
                    @foreach (auth()->user()->Notifications as $notification)
                   
                      <a id="notstyle" style="background-color:#b5bab6 ; color:white "  href="/produitstock/{{$notification->data['produitstock_id']}}" data-notif-id="{{$notification->id}}">
                        {{$notification->data['user_name']}}
                        {{$notification->data['msg']}}
                        {{$notification->data['magasin']}}

                    
                    </a>
                    @endforeach 
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="/notification">View all</a></li>
            </ul>
          </li>
        </ul>
        </div>
          <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}} - Admin
                  <small>Member since july. 2019</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
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
          <img src={{asset('AdminLTE/dist/img/user2-160x160.jpg')}} class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{route('facture.index')}}"><i class="fas fa-hand-holding-usd"></i> <span>Bon de Livraison Facture</span></a></li>

        <li class="active"><a  href="{{route('bentree.index')}}"><i class="fas fa-network-wired"></i><span>Bon de Entree</span> </a></li>
        <li class="active"><a  href="{{route('bsortie.index')}}"><i class="fas fa-shipping-fast"></i><span>Bon de Sortie</span> </a></li>
      
     
        <li class="treeview">
          <a href=""><i class="fas fa-dollar-sign"></i> <span>Achat</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
        <ul class="treeview-menu">

        <li><a   href="{{route('achat.index')}}">Demande Achat </a></li>
        <li><a  href="{{route('produitachat.index')}}"> Produit Achat</a></li>
        </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Reap</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a   href="{{route('demandereap.index')}}"> Demande Reap </a></li>
            <li><a   href="{{route('produitreap.index')}}">Produit Reap </a></li>
          </ul>
        </li>
           
        <li class="treeview">
          <a href=""><i class="fas fa-cogs"></i> <span>Configuration</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
        <ul class="treeview-menu" >
        <li><a href="{{route('magasin.index')}}"> Magasin</a></li>
        <li><a href="{{route('fournisseur.index')}}"> Fournisseur</a></li>
        <li><a href="{{route('produit.index')}}">Liste de Produit</a></li>


        </ul>
      </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content container-fluid">
      @include('inc.messages')
      <div class="card">
        <div class="card-body">
          
        @yield('content')







        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src={{asset('AdminLTE/bower_components/jquery/dist/jquery.min.js')}}></script>
<!-- Bootstrap 3.3.7 -->
<script src={{asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}></script>
<!-- AdminLTE App -->
<script src={{asset('AdminLTE/dist/js/adminlte.min.js')}}></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
$('a[data-notif-id]').click(function () {

        var id   = $(this).data('notif-id');

        $.ajax({
          url : "{{route('ajaxread') }}",
          data :{"id":id} ,
         
          type: 'get',
          datatype: 'json',
        
        success: function(result)
        {
          $("#notstyle").removeAttr("style");
          console.log(result);
          
        }
        })
})
//-------------------------
$(document).ready(function(){
  $("#markread").click(function(){
    $("#notstyle").removeAttr("style");
  })
})
</script>
@yield('script')


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>