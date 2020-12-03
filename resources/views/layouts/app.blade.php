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
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/public/template/dist/css/adminlte.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/public/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700')}}">
  @section('css')
    @show
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">
  <!-- Navbar -->
<nav class="main-header navbar navbar-expand-sm navbar-blue navbar-dark">
  <div class="container">
    <a href="{{url('/')}}" class="navbar-brand">
      <img src="{{asset('/public/template/dist/img/ulm.ico')}}" alt="ULM Logo" class="brand-image img-responsive">
      <span class="brand-text font-weight-normal">cek<strong>TA PSTS</strong></span>
    </a>
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item {{'download' == request()->path() ? 'active' : '' }}">
          <a href="{{route('guestDownload')}}" class="nav-link">Download</a>
        </li>
        <li class="nav-item {{'topikta' == request()->path() ? 'active' : '' }}">
          <a href="{{route('guestTopik')}}" class="nav-link">Topik TA</a>
        </li>
        <li class="nav-item {{'pencarian' == request()->path() ? 'active' : '' }}">
          <a href="{{route('guestPencarian')}}" class="nav-link">Pencarian TA</a>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Jadwal Sidang</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{route('guestSeminar')}}" class="dropdown-item {{'seminar' == request()->path() ? 'active' : '' }}">Seminar Proposal</a></li>
            <li><a href="{{route('guestSidang')}}" class="dropdown-item {{'sidang' == request()->path() ? 'active' : '' }}">Sidang Tugas Akhir</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item">
        <a class="nav-link btn btn-primary {{'login' == request()->path() ? 'active' : '' }}" href="{{ route('login') }}" style="color:white">
           Login <i class="fas fa-sign-in-alt"></i>
        </a>
      </li>
    </ul>
  </div>
</nav>
<!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

      @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="container">    
  <!-- To the right -->
    <a>Copyright &copy; <b><font color="#009BFF">cekTA</font></b> {{date('Y')}} | <a href="{{url('http://prodisipil.ft.ulm.ac.id')}}" target="blank">Teknik Sipil Universitas Lambung Mangkurat</a></a>
    <div class="float-right d-none d-sm-inline">
      <a>Template by <a href="https://adminlte.io" target="blank">AdminLTE</a></a>
    </div>
    <!-- Default to the left -->
  </div>
</footer>
  <!-- Main Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('/public/template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/public/template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/public/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/public/template/dist/js/adminlte.js')}}"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('/public/template/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('/public/template/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/public/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('/public/template/plugins/chart.js/Chart.min.js')}}"></script>
@include('sweetalert::alert')
@section('js')
@show
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
