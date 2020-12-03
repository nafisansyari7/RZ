@section('js')
<script>
  $(function () {
  /* ChartJS
    * -------
    * Here we will create a few charts using ChartJS
    */
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#bidangTA').get(0).getContext('2d')
    var pieData = {
      labels: [
        'Air',
        'Geoteknik',
        'Manajemen',
        'Struktur',
        'Transport',
      ],
      datasets: [{
        data: [
          {{$tugasakhir->where('bidang', 'Air')->count()}},
          {{$tugasakhir->where('bidang', 'Geoteknik')->count()}}, 
          {{$tugasakhir->where('bidang', 'Manajemen')->count()}}, 
          {{$tugasakhir->where('bidang', 'Struktur')->count()}}, 
          {{$tugasakhir->where('bidang', 'Transport')->count()}}
        ],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
      }]
    }
    var pieOptions = {
      maintainAspectRatio: true,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var bidangTA = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
    
    var pieChartCanvas = $('#mahasiswaStatus').get(0).getContext('2d')
    var pieData = {
      labels: [
        'Aktif',
        'Tidak Aktif',
        'Cuti',
        'Lulus',
      ],
      datasets: [{
        data: [
          {{$mahasiswa->where('status', 'Aktif')->count()}},
          {{$mahasiswa->where('status', 'Tidak Aktif')->count()}}, 
          {{$mahasiswa->where('status', 'Cuti')->count()}}, 
          {{$mahasiswa->where('status', 'Lulus')->count()}}
        ],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
      }]
    }
    var pieOptions = {
      maintainAspectRatio: true,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var mahasiswaStatus = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  })
</script>
@stop

@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-folder"></i></span>
              <div class="info-box-content">
                
                <span class="info-box-text">Proposal</span>
                <span class="info-box-number">{{$tugasakhir->where('status', 'Proposal')->count()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-folder"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Tugas Akhir</span>
                <span class="info-box-number">{{$mahasiswa->where('status', 'Tugas Akhir')->count()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-folder"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Lulus</span>
                <span class="info-box-number">{{$mahasiswa->where('status', 'Lulus')->count()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Mahasiswa Aktif</span>
                <span class="info-box-number">{{$mahasiswa->where('status', 'Aktif')->count()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->

          @if(auth()->user()->role == 'Mahasiswa')
          <!-- Main content -->
          <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card card-primary card-outline">
                    <div class="card-body">
                      <img src="{{url('/public/images/Langkah.svg')}}" alt="Langkah" width="100%">
                    </div>
                  </div><!-- /.card -->
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </div>
          @endif
          @if(auth()->user()->role !== 'Mahasiswa')
          <!-- Main content -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <!-- PIE CHART -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Rekapitulasi Tugas Akhir Berdasarkan Bidang Penelitian</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="bidangTA" style="height:230px"></canvas>
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.col (LEFT) -->
              <div class="col-md-6">
                <!-- PIE CHART -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Rekapitulasi Status Mahasiswa</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="mahasiswaStatus" style="height:230px"></canvas>
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.col (LEFT) -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body table-responsive">
                    <table id="example1" class="table">
                        <thead>
                        <tr>
                          <th>NIDN</th>
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>Kuota</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($dosen as $dsn)
                        <tr>
                          <td>{{$dsn->nidn}}</a></td>
                          <td>{{$dsn->nip}}</td>
                          <td>{{$dsn->nama}}</td>
                          <td>{{$dsn->kuota}}</td>
                        </tr>
                      @endforeach

                      </tbody>
                    </table>
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
            @endif

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
        </div><!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection