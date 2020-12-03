<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>cekTA PSTS</title>
    <link rel="icon" href="{!! asset('/public/template/dist/img/ulm.ico')!!}"/>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('/public/template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('/public/template/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/public/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/public/template/dist/css/adminlte.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('/public/template/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}">
    @section('css')
    @show
  </head>
  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a role="button" href="{{route('profil')}}" class="dropdown-item" >
                  <i class="fas fa-user-cog"></i> {{ __('Profile') }}
              </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
      </ul>
    </nav><!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-3">
      <!-- Brand Logo -->
      <a href="{{url('/')}}" class="brand-link navbar-primary">
        <img src="{{asset('/public/template/dist/img/ulm.png')}}" alt="ULM Logo" class="brand-image">
        <span class="brand-text font-weight-normal text-white">cek<strong>TA PSTS</strong></span>
      </a>

      <!-- Sidebar -->
      <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="pull-left image">
            <img src="{{url('https://ui-avatars.com/api/?name='.Auth::user()->name.'&background=1b8bf9&color=fff&rounded=true') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="pull-left info">
            <a class="d-block">{{ Auth::user()->name }}</a>
            @if(Auth::user()->role == 'Dosen')
              <small class="d-block">{{ Auth::user()->username}}</small>
            @elseif(Auth::user()->role == 'Mahasiswa')
              <small class="d-block">{{ Auth::user()->username}}</small>
            @endif
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{route('home')}}" class="nav-link {{'home' == request()->path() ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <!-- Menu untuk Mahasiswa -->
            @if(Auth::user()->role == 'Mahasiswa')
            <li class="nav-header">Menu</li>
            <li class="nav-item">
              <a href="{{route('berkas.create')}}" class="nav-link {{'uploadBerkas' == request()->path() ? 'active' : '' }}">
                <i class="fas fa-upload nav-icon"></i>
                <p>Upload Berkas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('tugasakhir.create')}}" class="nav-link {{'tugasakhir/create' == request()->path() ? 'active' : '' }}">
                <i class="fas fa-book-open nav-icon"></i>
                <p>Daftar Tugas Akhir</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('mahasiswaTA')}}" class="nav-link {{'mahasiswaTA' == request()->path() ? 'active' : '' }}">
                <i class="fas fa-book nav-icon"></i>
                <p>Status Tugas Akhir</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('dosen.index')}}" class="nav-link {{'dosen' == request()->path() ? 'active' : '' }}">
                <i class="fas fa-user nav-icon"></i>
                <p>Kuota Dosen</p>
              </a>
            </li>

            <!-- Menu untuk Dosen -->
            @elseif(Auth::user()->role == 'Dosen')
            <li class="nav-header">Menu</li>
            <li class="nav-item">
              <a href="{{route('topik.index')}}" class="nav-link {{'topik' == request()->path() ? 'active' : '' }}">
                <i class="fas fa-book-open nav-icon"></i>
                <p>Topik Tugas Akhir</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('tugasakhir.index')}}" class="nav-link {{'tugasakhir' == request()->path() ? 'active' : '' }}">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>Tugas Akhir</p>
              </a>
            </li>

            <!-- Menu untuk Admin -->
            @else
            <li class="nav-header">Menu</li>
            @if(Auth::user()->role == 'Admin')
            <li class="nav-item">
              <a href="{{route('berkas.index')}}" class="nav-link {{'berkas' == request()->path() ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>Berkas Pendaftaran</p>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a href="{{route('tugasakhir.index')}}" class="nav-link {{'tugasakhir' == request()->path() ? 'active' : '' }}">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>Mahasiswa TA</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('topik.index')}}" class="nav-link {{'topik' == request()->path() ? 'active' : '' }}">
                <i class="fas fa-book-open nav-icon"></i>
                <p>Topik dari Dosen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('agenda.index')}}" class="nav-link {{'agenda' == request()->path() ? 'active' : '' }}">
                <i class="fas fa-calendar-alt nav-icon"></i>
                <p>Jadwal Sidang</p>
              </a>
            </li>
            @if(Auth::user()->role == 'Admin')
            <li class="nav-item">
              <a href="{{route('acuan.index')}}" class="nav-link {{'acuan' == request()->path() ? 'active' : '' }}">
                <i class="fas fa-file-pdf nav-icon"></i>
                <p>Dokumen</p>
              </a>
            </li>
            @endif
            <li class="nav-header">Data</li>
            <li class="nav-item">
              <a href="{{route('mahasiswa.index')}}" class="nav-link {{'mahasiswa' == request()->path() ? 'active' : '' }}">
                <i class="nav-icon fas fa-user text-danger"></i>
                <p>Data Mahasiswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('dosen.index')}}" class="nav-link {{'dosen' == request()->path() ? 'active' : '' }}">
                <i class="nav-icon fas fa-user text-warning"></i>
                <p>Data Dosen</p>
              </a>
            </li>
            @if(Auth::user()->role == 'Admin')
            <li class="nav-item">
              <a href="{{route('user.index')}}" class="nav-link {{'user' == request()->path() ? 'active' : '' }}">
                <i class="nav-icon fas fa-user text-success"></i>
                <p>Data User</p>
              </a>
            </li>
            @endif
            @endif

            <li class="nav-header">Lainnya</li>
            <li class="nav-item">
              <a href="{{route('profil')}}" class="nav-link {{'profil' == request()->path() ? 'active' : '' }}">
                <i class="fas fa-user-cog nav-icon"></i>
                <p>Profil</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('manual')}}" class="nav-link {{'manual' == request()->path() ? 'active' : '' }}">
                <i class="fas fa-info-circle nav-icon"></i>
                <p>Petunjuk</p>
              </a>
            </li>
          </ul>
        </nav><!-- /.sidebar-menu -->
      </section><!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <!-- To the right -->
        <a>Copyright &copy; <b><font color="#009BFF">cekTA</font></b> {{date('Y')}} | <a href="{{url('http://prodisipil.ft.ulm.ac.id')}}" target="blank">Teknik Sipil Universitas Lambung Mangkurat</a></a>
    </footer>
  <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- Main Footer -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{asset('/public/template/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('/public/template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Select2 -->
  <script src="{{asset('/public/template/plugins/select2/js/select2.full.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('/public/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('/public/template/dist/js/adminlte.js')}}"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="{{asset('/public/template/dist/js/demo.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('/public/template/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('/public/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('/public/js/pdfobject.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('/public/template/plugins/chart.js/Chart.min.js')}}"></script>
@include('sweetalert::alert')
@section('js')
@show
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Initialize Select2 Elements
      $('.select2').select2()

      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "iDisplayLength":50
      });
    });
  </script>
  </body>
</html>
