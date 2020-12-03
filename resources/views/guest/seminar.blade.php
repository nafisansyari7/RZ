@extends('layouts.app')
@section('content')
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Seminar Proposal Tugas Akhir</h1>
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
                    <th style="width: 15%">Tanggal</th>
                    <th style="width: 10%">Waktu</th>
                    <th style="width: 40%">Judul</th>
                    <th style="width: 15%">Mahasiswa</th>
                    <th style="width: 10%">Ruang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($agenda as $data)
                  <tr>
                    <td>{{date('D, d M Y', strtotime($data->tanggal))}}</td>
                    <td>{{$data->waktu}}</td>
                    <td>{{$data->tugasakhir->judul}}</td>
                    <td>{{$data->tugasakhir->mahasiswa->nama}}</td>
                    <td>{{$data->ruang}}</td>
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