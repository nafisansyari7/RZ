@extends('layouts.app')
@section('content')
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Download</h1>
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
              <div class="card-body table-responsive p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>File</th>
                      <th style="width: 40px"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($acuan as $data)
                    <tr>
                      <td>{{$data->keterangan}}</td>
                      <td><a href="{{asset('dokumen/'.$data->berkas)}}" class="btn btn-primary btn-sm" download>Download</a></td>
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