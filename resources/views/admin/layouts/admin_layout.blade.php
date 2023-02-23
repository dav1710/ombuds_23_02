<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin_panel/plugins/fontawesome-free/css/all.min.css') }}"  crossorigin="anonymous" referrerpolicy="no-referrer" >
  <link rel="shortcut icon" href="{{ asset('img/ombuds_logo.png') }}" type="image/x-icon">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/bootstrap-select.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/audio.css') }}">
  @yield('styles')

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <style>
        .card {
            overflow-x: scroll;
        }

		.nav-item.active a {
			color: #343a40;
			background-color: rgba(255,255,255,.9);
		}

		.page-item.active .page-link {
			background-color: #4f5962;
			border-color: #4f5962;
		}

		.page-link {
			color: #4f5962;
		}

        td {
            max-width: 300px;
        }

		.truncate p {
			display: -webkit-box;
			overflow: hidden;
			text-overflow: ellipsis;
			-webkit-line-clamp: 4;
			-webkit-box-orient: vertical;
		}

		.truncate p:not(.truncate p:first-child, .truncate div ~ p) {
			display: none;
		}
    </style>

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin') }}" class="nav-link">Գլխավոր</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">Դուրս գալ</a>
    </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('img/ombuds_logo.png')  }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ՄԻՊ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
        <div class="info">
          <h5 class="d-block text-light">{{ auth()->user()->name }}</h5>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item {{ Request::is('admin/link') ? 'active' : '' }}">
		        <a href="{{ route('link.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-solid fa-link"></i>
		            <p>Հղումներ</p>
		        </a>
		    </li>
		    <li class="nav-item {{ Request::is('admin/page') ? 'active' : '' }}">
		        <a href="{{ route('page.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-solid fa-scroll"></i>
		            <p>էջեր</p>
		        </a>
		    </li>
		    <li class="nav-item {{ Request::is('admin/tab') ? 'active' : '' }}">
		        <a href="{{ route('tab.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-solid fa-table"></i>
		            <p>Ենթաէջեր</p>
		        </a>
		    </li>
			<li class="nav-item {{ Request::is('admin/news') ? 'active' : '' }}">
		        <a href="{{ route('news.index') }}" class="nav-link">
		            <i class="nav-icon far fa-light fa-newspaper"></i>
		            <p>Նորություններ</p>
		        </a>

		    </li>
		    <li class="nav-item {{ Request::is('admin/document') ? 'active' : '' }}">
		        <a href="{{ route('document.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-regular fa-file-pdf"></i>
		            <p>Փաստաթղթեր</p>
		        </a>

		    </li>
			<li class="nav-item {{ Request::is('admin/address') ? 'active' : '' }}">
		        <a href="{{ route('address.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-solid fa-address-book"></i>
		            <p>Հասցեներ</p>
		        </a>

		    </li>
			<li class="nav-item {{ Request::is('admin/mediaFile') ? 'active' : '' }}">
		        <a href="{{ route('mediaFile.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-regular fa-file-audio"></i>
		            <p>Աուդիո</p>
		        </a>

		    </li>
			<li class="nav-item {{ Request::is('admin/employee') ? 'active' : '' }}">
		        <a href="{{ route('employee.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-solid fa-user"></i>
		            <p>Աշխատակազմ</p>
		        </a>

		    </li>
			<li class="nav-item {{ Request::is('admin/vacancy') ? 'active' : '' }}">
		        <a href="{{ route('vacancy.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-solid fa-briefcase"></i>
		            <p>Աշխատատեղեր</p>
		        </a>

		    </li>
			<li class="nav-item {{ Request::is('admin/ombudsman') ? 'active' : '' }}">
		        <a href="{{ route('ombudsman.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-solid fa-user-shield"></i>
		            <p>Պաշտպաններ</p>
		        </a>

		    </li>
			<li class="nav-item {{ Request::is('admin/slide') ? 'active' : '' }}">
		        <a href="{{ route('slide.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-solid fa-images"></i>
		            <p>Սլայդներ</p>
		        </a>
			</li>
			<li class="nav-item {{ Request::is('admin/staticText') ? 'active' : '' }}">
		        <a href="{{ route('staticText.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-solid fa-file-alt"></i>
		            <p>Տեքստեր</p>
		        </a>
			</li>
			<li class="nav-item {{ Request::is('admin/applicant') ? 'active' : '' }}">
		        <a href="{{ route('applicant.index') }}" class="nav-link">
		            <i class="nav-icon fas fas fa-solid fa-paste fa-2xl"></i>
		            <p>Դիմումներ</p>
		        </a>
			</li>
			<li class="nav-item {{ Request::is('admin/statistics') ? 'active' : '' }}">
		        <a href="{{ route('statistics.index') }}" class="nav-link">
		            <i class="nav-icon fas fa-solid fa-chart-pie"></i>
		            <p>Վիճակագրություն</p>
		        </a>
			</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
<!-- /.content-wrapper -->


<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2022-... <a target="_blank" href="https://locator.am">Locator CJSC</a>.</strong>
  All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{ asset('admin_panel/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('admin_panel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
<script src="{{ asset('admin_panel/plugins/ckeditor/ckeditor.js')}}" crossorigin="anonymous"></script>
<!-- AdminLTE -->
<script src="{{ asset('admin_panel/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('admin_panel/dist/js/bootstrap-select.min.js') }}"></script>
@yield('scripts')
</body>
</html>
