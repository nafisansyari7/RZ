@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Dosen</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-plus-square"></i> Edit Dosen</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
    <form action="{{route('dosen.update', $dosen)}}" method="POST">
    @method('PUT')
    @csrf
                <div class="form-group">
                  <label>NIDN</label>
                  <input type="text" class="form-control @error('nidn') is-invalid @enderror" value="{{ $dosen->nidn }}" name="nidn" disabled/>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" class="form-control @error('nip') is-invalid @enderror" value="{{ $dosen->nip }}" name="nip"/>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $dosen->nama }}" name="nama"/>
                    @error('nama')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" value="{{ $dosen->user->email }}" name="email"/>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Kuota</label>
                  <input type="number" class="form-control" value="{{ $dosen->kuota }}" name="kuota" min="1" max="20"/>
                </div>
                <!-- /.form-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
    </form>
        </div><!-- /.card -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
@endsection