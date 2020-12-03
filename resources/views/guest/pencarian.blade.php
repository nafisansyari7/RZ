@extends('layouts.app')
@section('content')
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Mahasiswa Tugas Akhir</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive">
                <table id="example1" class="table">
                  <thead>
                    <tr>
                      <th width="8%">Nama</th>
                      <th width="3%">NIM</th>
                      <th width="20%">Judul</th>
                      <th width="10%">Pembimbing</th>
                      <th width="5%">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($tugasakhir as $ta)
                    <tr>
                      <td>{{$ta->mahasiswa->nama}}</td>
                      <td>{{$ta->mahasiswa->nim}}</td>
                      <td>{{$ta->judul}}</td>
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
                        @elseif($ta->status == 'Pengumpulan Revisi')
                          <label class="btn btn-xs btn-warning">Pengumpulan Revisi</label>
                        @else
                          <label class="btn btn-xs btn-primary">Selesai</label>
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
      </div><!-- /.container-fluid -->
    </div>
@endsection