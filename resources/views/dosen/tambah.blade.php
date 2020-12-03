@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Dosen</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-plus-square"></i> Tambah Dosen</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
    <form action="{{ route('dosen.store')}}" method="POST">
    @csrf
                <div class="form-group">
                  <label>NIDN</label>
                  <input type="text" class="form-control @error('nidn') is-invalid @enderror" value="{{ old('nidn') }}" name="nidn"/>
                    @error('nidn')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" name="nip"/>
                    @error('nip')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" name="nama"/>
                    @error('nama')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" value="{{ old('email') }}" name="email"/>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Kuota</label>
                  <input type="number" class="form-control" value="{{ old('kuota') }}" name="kuota" min="1" max="20"/>
                </div>
                <!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
    </form>
        </div><!-- /.card -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
@endsection