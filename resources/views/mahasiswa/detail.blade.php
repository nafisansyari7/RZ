@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Mahasiswa</h1>
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
                  <h3 class="card-title">Detail Mahasiswa</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <th>NIM</th>
                        <td>{{$mahasiswa->nim}}</td>
                      </tr>
                      <tr>
                        <th>Nama Lengkap</th>
                        <td>{{$mahasiswa->nama}}</td>
                      </tr>
                      <tr>
                        <th>Angkatan</th>
                        <td>{{$mahasiswa->angkatan}}</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{$mahasiswa->user->email}}</td>
                      </tr>
                      <tr>
                        <th>Status</th>
                        <td>{{$mahasiswa->status}}</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td>
                        
                          <a href="{{route('mahasiswa.index')}}" class="btn btn-success btn-sm"><i class="fas fa-caret-square-left"></i> Kembali</a>
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

