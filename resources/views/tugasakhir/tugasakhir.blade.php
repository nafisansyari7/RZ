@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Mahasiswa Tugas Akhir</h1>
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
              <a href="{{route('tambahTA')}}" class="btn btn-sm btn-default" style="color:black"><i class="far fa-plus-square"></i> Tambah</a>
              <a href="{{route('tugasakhir.exportExcel')}}" class="btn btn-sm btn-success" style="color:white"><i class="fas fa-file-export"></i> Export</a>
            </div>
            <!-- /.card-header -->
            @endif
            <div class="card-body table-responsive">
            @if(Auth::user()->role == 'Mahasiswa')
              <table class="table">
            @else
              <table id="example1" class="table">
            @endif
                <thead>
                  <tr>
                    <th width="8%">Nama</th>
                    <th width="4%">NIM</th>
                    <th width="3%">Angkatan</th>
                    <th width="20%">Judul</th>
                    <th width="10%">Pembimbing</th>
                    <th width="5%">Status</th>
                    @if(Auth::user()->role == 'Admin')
                    <th width="7%">Catatan</th>
                    <th width="5%">Aksi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                @foreach($tugasakhir as $ta)
                  <tr>
                    <td>{{$ta->mahasiswa->nama}}</td>
                    <td>{{$ta->mahasiswa->nim}}</td>
                    <td>{{$ta->mahasiswa->angkatan}}</td>
                    <td>
                        <a href="{{route('tugasakhir.show',$ta->id)}}">{{$ta->judul}}</a>
                        </td>
                    <td> 
                      <ol style="padding-left: 10px;">
                      @if(!is_null($ta->pembimbing))
                          @foreach($ta->pembimbing as $pembimbing)
                        @if(!is_null($pembimbing->dosen))
                            <li>{{ $pembimbing->dosen->nama }}</li>
                        @endif
                          @endforeach
                        @endif
                        </ol>
                      </td>
                      <td>
                        @if($ta->status == 'Mendaftar')
                          <label class="btn btn-xs btn-default">Mendaftar</label>
                        @elseif($ta->status == 'Proposal')
                          <label class="btn btn-xs btn-info">Proposal</label>
                        @elseif($ta->status == 'Tugas Akhir')
                          <label class="btn btn-xs btn-success">Tugas Akhir</label>
                        @elseif($ta->status == 'Revisi Tugas Akhir')
                          <label class="btn btn-xs btn-warning">Revisi Tugas Akhir</label>
                        @elseif($ta->status == 'Selesai')
                          <label class="btn btn-xs btn-primary">Selesai</label>
                        @endif
                      </td>
                      @if(Auth::user()->role == 'Admin')
                      <td><label class="badge badge-warning">{{$ta->catatan}}</label></td>
                      <td><a href="{{route('tugasakhir.edit',$ta->id)}}" class="btn btn-success btn-sm">Edit</a></td>
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