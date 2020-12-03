@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Mahasiswa</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
             @if(Auth::user()->role == 'Admin')
            <div class="card-header">
            <a href="{{route('mahasiswa.create')}}" class="btn btn-sm btn-primary" style="color:white"><i class="far fa-plus-square"></i> Tambah</a>
            <a href="{{route('mahasiswa.exportExcel')}}" class="btn btn-sm btn-success" style="color:white" target="_blank"><i class="fas fa-file-export"></i> Export</a>
            <form action="{{route('mahasiswa.importExcel')}}" method="post" class="float-sm-right d-inline-block" enctype="multipart/form-data">
              @csrf
              <div class="input-group">
                <input type="file" class="form-control" name="importMahasiswa" required="">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-flat btn-primary">Import</button>
                </span>
              </div>
            </form>
            </div>
            @endif
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table">
                <thead>
                  <tr>
                    <th style="width: 10%">NIM</th>
                    <th>Nama</th>
                    <th>Angkatan</th>
                    <th>Status</th>
                    @if(Auth::user()->role == 'Admin')
                    <th>Aksi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                @foreach($mahasiswa as $mhs)
                  <tr>
                    <td><a href="{{route('mahasiswa.show',$mhs->id)}}" >{{$mhs->nim}}</a></td>
                    <td>{{$mhs->nama}}</td>
                    <td>{{$mhs->angkatan}}</td>
                    <td>
                        @if($mhs->status == 'Aktif')
                          <label class="btn btn-xs btn-warning">Aktif</label>
                        @elseif($mhs->status == 'Cuti')
                          <label class="btn btn-xs btn-info">Cuti</label>
                        @elseif($mhs->status == 'Tidak Aktif')
                          <label class="btn btn-xs btn-danger">Tidak Aktif</label>
                        @elseif($mhs->status == 'Lulus')
                          <label class="btn btn-xs btn-warning">Lulus</label>
                        @elseif($mhs->status == 'Tugas Akhir')
                          <label class="btn btn-xs btn-success">Tugas Akhir</label>
                        @else
                          <label class="btn btn-xs btn-primary">Selesai</label>
                        @endif
                      </td>
                    @if(Auth::user()->role == 'Admin')
                    <td>
                      <a href="{{route('mahasiswa.edit',$mhs->id)}}" class="btn btn-success btn-sm">Edit</a>
                    </td>
                    @endif
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