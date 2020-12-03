@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Mahasiswa</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-plus-square"></i> Tambah Mahasiswa</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
    <form action="{{ route('mahasiswa.store')}}" method="POST">
    @csrf
                <div class="form-group">
                  <label>NIM</label>
                  <input type="text" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim') }}" name="nim"/>
                    @error('nim')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" name="nama"/>
                    @error('nama')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" value="{{ old('email') }}" name="email"/>
                </div>
                <!-- /.form-group -->
                
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Angkatan</label>
                  <input type="number" class="form-control" value="{{ old('angkatan') }}" name="angkatan"/>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" value="{{ old('status') }}" name="status">
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    <option value="Cuti" {{ old('status') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                    <option value="Lulus" {{ old('status') == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                  </select>
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