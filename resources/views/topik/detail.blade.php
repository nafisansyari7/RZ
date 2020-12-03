@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Topik</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="col-md-12">
          <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Detail Topik</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <th>Nama Dosen</th>
                        <td><strong>{{$topik->dosen->nama}}</strong></td>
                      </tr>
                      <tr>
                        <th>Topik</th>
                        <td>{{$topik->judul}}</td>
                      </tr>
                      <tr>
                        <th>Bidang</th>
                        <td>{{$topik->bidang}}</td>
                      </tr>
                      <tr>
                        <th>Deskripsi</th>
                        <td>{{$topik->deskripsi}}</td>
                      </tr>
                      <tr>
                        <th>Status</th>
                        <td><strong>{{$topik->status}}</strong></td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td>
                          <a href="{{route('topik.index')}}" class="btn btn-success btn-sm"><i class="fas fa-caret-square-left"></i> Kembali</a>
                        </td>
                        <td></td>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.card-body -->
              </div>
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
@endsection

