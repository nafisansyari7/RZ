@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Topik TA dari Dosen</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          
              @if(Auth::user()->role == 'Dosen')
            <div class="card-header"><!-- Card Header -->
              <a href="{{route('topik.create')}}" class="btn btn-sm btn-default" style="color:black"><i class="far fa-plus-square"></i> Tambah</a>
            </div>
              @elseif(Auth::user()->role == 'Admin')
            <div class="card-header"><!-- Card Header -->
              <a href="{{route('tambahTopik')}}" class="btn btn-sm btn-default" style="color:black"><i class="far fa-plus-square"></i> Tambah</a>
              <a href="{{route('topik.exportExcel')}}" class="btn btn-sm btn-success" style="color:white"><i class="fas fa-file-export"></i> Export</a>
            </div>
              @endif
            <div class="card-body table-responsive">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th style="width: 50%">Judul</th>
                            <th>Nama Dosen</th>
                            <th>Bidang</th>
                            <th>Status</th>
                            @if(Auth::user()->role !== 'Mahasiswa')
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($topik as $tpk)
                      <tr>
                          <td><a href="{{route('topik.show',$tpk->id)}}">{{$tpk->judul}}</td>
                          <td>{{$tpk->dosen->nama}}</td>
                          <td>{{$tpk->bidang}}</td>
                          <td>
                            @if($tpk->status == 'Belum Diambil')
                              <label class="btn btn-xs btn-warning">Belum Diambil</label>
                            @else
                              <label class="btn btn-xs btn-primary">Sudah Diambil</label>
                            @endif
                          </td>
                          @if(Auth::user()->role !== 'Mahasiswa')
                          <td>
                              <a href="{{route('topik.edit',$tpk->id)}}" class="btn btn-success btn-sm">Edit</a>
                              <form action="{{ route('topik.destroy', $tpk->id) }}" method="post" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
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