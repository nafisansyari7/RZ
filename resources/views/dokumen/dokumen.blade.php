@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dokumen</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header"><!-- Card Header -->
                @if(Auth::user()->role == 'Admin')
                <a href="{{route('acuan.create')}}" class="btn btn-sm btn-primary" style="color:white"><i class="far fa-plus-square"></i> Tambah</a>
                @endif
            </div>
            <div class="card-body">
              <table id="example1" class="table">
                <thead>
                  <tr>
                    <th style="width: 50%">Keterangan</th>
                    <th>File</th>
                    <th width="10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($acuan as $data)
                  <tr>
                    <td><a href="{{route('acuan.show',$data->id)}}">{{$data->keterangan}}</td>
                    <td>{{$data->berkas}}</td>
                    <td>
                        <form action="{{ route('acuan.destroy', $data->id) }}" method="post" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
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