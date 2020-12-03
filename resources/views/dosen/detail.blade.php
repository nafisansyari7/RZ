@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Dosen</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="col-md-8">
          <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Detail Dosen</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <th>NIDN</th>
                        <td>{{$dosen->nidn}}</td>
                      </tr>
                      <tr>
                        <th>NIP</th>
                        <td>{{$dosen->nip}}</td>
                      </tr>
                      <tr>
                        <th>Nama Lengkap</th>
                        <td>{{$dosen->nama}}</td>
                      </tr>
                      <tr>
                      <tr>
                        <th>Email</th>
                        <td>{{$dosen->user->email}}</td>
                      </tr>
                      <tr>
                        <th>Kuota</th>
                        <td>{{$dosen->kuota}}</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td>
                        
                          <a href="{{route('dosen.index')}}" class="btn btn-success btn-sm"><i class="fas fa-caret-square-left"></i> Kembali</a>
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

