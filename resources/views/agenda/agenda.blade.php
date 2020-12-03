@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Sidang</h1>
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
            <div class="card-header"><!-- Card Header -->
                <a href="{{route('agenda.create')}}" class="btn btn-sm btn-primary" style="color:white"><i class="far fa-plus-square"></i> Tambah</a>
            </div>
                @endif
            <div class="card-body table-responsive">
              <table id="example1" class="table">
                <thead>
                  <tr>
                    <th style="width: 30%">Judul</th>
                    <th style="width: 15%">Mahasiswa</th>
                    <th style="width: 10%">Tanggal</th>
                    <th style="width: 10%">Waktu</th>
                    <th style="width: 10%">Ruang</th>
                    <th style="width: 10%">Status</th>
                    @if(Auth::user()->role == 'Admin')
                    <th width="10%">Aksi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                @foreach($agenda as $data)
                  <tr>
                    <td>{{$data->tugasakhir->judul}}</td>
                    <td>{{$data->tugasakhir->mahasiswa->nama}}</td>
                    <td>{{date('D, d M Y', strtotime($data->tanggal))}}</td>
                    <td>{{$data->waktu}}</td>
                    <td>{{$data->ruang}}</td>
                    <td>{{$data->status}}</td>
                    @if(Auth::user()->role == 'Admin')
                    <td>
                        <a href="{{route('agenda.edit',$data->id)}}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('agenda.destroy', $data->id) }}" method="post" class="d-inline">
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