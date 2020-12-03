@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Berkas Pendaftaran Tugas Akhir</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-hover">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Transkrip</th>
                    <th>Pengajuan TA</th>
                    <th>Kesediaan Pembimbing</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($berkas as $data)
                  <tr>
                    <td><a href="{{route('berkas.show',$data->id)}}">{{$data->mahasiswa->nama}}</td>
                    <td>{{$data->mahasiswa->nim}}</td>
                    <td>
                      @if($data->transkrip == '')
                        <label class="btn btn-xs btn-warning">Belum Ada</label>
                      @else
                        <label class="btn btn-xs btn-primary">Ada</label>
                      @endif
                    </td>
                    <td>
                      @if($data->surat_pengajuan == '')
                        <label class="btn btn-xs btn-warning">Belum Ada</label>
                      @else
                        <label class="btn btn-xs btn-primary">Ada</label>
                      @endif
                    </td>
                    <td>
                      @if($data->surat_pembimbing == '')
                        <label class="btn btn-xs btn-warning">Belum Ada</label>
                      @else
                        <label class="btn btn-xs btn-primary">Ada</label>
                      @endif
                    </td>
                    <td>
                      @if($data->verifikasi == 'Belum')
                        <form action="{{ route('berkas.update', $data->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <button class="btn btn-success btn-sm" onclick="return confirm('Anda yakin berkas ini sudah benar?')">Verifikasi</button>
                        </form>
                        <form action="{{ route('berkas.salah', $data->id) }}" class="d-inline" method="post">
                          @csrf
                          @method('PATCH')
                          <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin berkas ini salah?')">Salah</button>
                        </form>
                      @elseif($data->verifikasi == 'Salah')
                        <button class="btn btn-sm btn-danger">Berkas Salah</button>
                      @elseif($data->verifikasi == 'Sudah')
                        <button class="btn btn-sm btn-success">Terverifikasi</button>
                      @endif
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
@endsection