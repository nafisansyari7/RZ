@extends('layouts.app')
@section('content')
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Topik TA dari Dosen</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

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
                        <th width="30%">Topik</th>
                        <th width="20%">Nama Dosen</th>
                        <th width="10%">Bidang</th>
                        <th width="20%">Deskripsi</th>
                        <th width="10%">Status</th>                      
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($topik as $tpk)
                    <tr>
                      <!-- <td><a class="detailTopik" href="#" role="button" data-toggle="modal" data-target="#modalTambah">{{$tpk->judul}}</a></td> -->
                      <td>{{$tpk->judul}}</td>
                      <td>{{$tpk->dosen->nama}}</td>
                      <td>{{$tpk->bidang}}</td>
                      <td>{{$tpk->deskripsi}}</td>
                      <td>
                        @if($tpk->status == 'Belum Diambil')
                          <label class="btn btn-xs btn-warning">Belum Diambil</label>
                        @else
                          <label class="btn btn-xs btn-primary">Sudah Diambil</label>
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