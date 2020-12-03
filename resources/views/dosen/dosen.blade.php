@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Dosen</h1>
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
            <a href="{{route('dosen.create')}}" class="btn btn-sm btn-primary" style="color:white"><i class="far fa-plus-square"></i> Tambah</a>
            <a class="btn btn-sm btn-success" style="color:white"><i class="fas fa-file-export"></i> Export</a>
            <form action="{{route('dosen.importExcel')}}" method="post" class="float-sm-right d-inline-block" enctype="multipart/form-data">
              @csrf
              <div class="input-group">
                <input type="file" class="form-control" name="importDosen" required="">
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
            @if(Auth::user()->role == 'Admin')
                <thead>
                  <tr>
                    <th style="width: 10%">NIDN</th>
                    <th style="width: 10%">NIP</th>
                    <th>Nama</th>
                    <th>Kuota</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($dosen as $dsn)
                  <tr>
                    <td><a href="{{route('dosen.show',$dsn->id)}}">{{$dsn->nidn}}</a></td>
                    <td>{{$dsn->nip}}</td>
                    <td>{{$dsn->nama}}</td>
                    <td>{{$dsn->kuota}}</td>
                    <td>{{$dsn->user->email}}</td>
                    <td>
                      <a href="{{route('dosen.edit',$dsn->id)}}" class="btn btn-success btn-sm">Edit</a>
                      <form action="{{ route('dosen.destroy', $dsn->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @else
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
              @endif

                </tbody>
              </table>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.row -->

    </section><!-- /.content -->
@endsection