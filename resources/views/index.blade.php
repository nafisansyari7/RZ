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

@extends('layouts.app')
@section('content')
    <div class="content-header ">
      <div class="container">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Sistem Informasi Pendaftaran Tugas Akhir</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h3>Informasi</h3>
              <div style="padding-bottom: 0; padding-top: 0; font-size: 18px; font-weight: 500">  
                
                  cekTA merupakan Sistem Informasi Pendaftaran Tugas Akhir yang ditujukan untuk pendaftaran dan pengelolaan data tugas akhir pada Program Studi S-1 Teknik Sipil Fakultas Teknik Universitas Lambung Mangkurat.
                
              </div>
              <div class="float-right">
                <button class="btn btn btn-primary" data-toggle="modal" data-target="#alur">Alur Tugas Akhir</button>
              </div>
            </div>
          </div>
          </div>
              <div class="col-md-6">
                <!-- PIE CHART -->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Rekapitulasi Tugas Akhir Berdasarkan Bidang Penelitian</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="bidangTA" style="height:230px;"></canvas>
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.col (LEFT) -->
              <div class="col-md-6">
                <!-- PIE CHART -->
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Rekapitulasi Status Mahasiswa</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="mahasiswaStatus" style="height:230px;"></canvas>
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
              </div><!-- /.col (LEFT) -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h2 class="card-title">Data Berkas Mahasiswa</h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-hover">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th width="20%">Status</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($berkas as $data)
                  <tr>
                    <td>{{$data->mahasiswa->nama}}</td>
                    <td>{{$data->mahasiswa->nim}}</td>
                    <td>
                      @if($data->verifikasi == 'Belum')
                          <button class="btn btn-info btn-sm">Sedang Diverifikasi</button>
                      @elseif($data->verifikasi == 'Salah')
                          <button class="btn btn-danger btn-sm">Berkas Salah</button>
                      @elseif($data->verifikasi == 'Sudah')
                        <button class="btn btn-sm btn-success">Sudah Diverifikasi</button>
                      @endif
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
          </div><!-- /.card -->
            </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="modal fade" id="alur">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img src="{{url('/public/images/Langkah.svg')}}" alt="Langkah" width="100%">
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
@endsection