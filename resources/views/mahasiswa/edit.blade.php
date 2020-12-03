@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Mahasiswa</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-plus-square"></i> Edit Mahasiswa</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
    <form action="{{route('mahasiswa.update', $mahasiswa)}}" method="POST">
    @method('PUT')
    @csrf
                <div class="form-group">
                  <label>NIM</label>
                  <input type="text" class="form-control @error('nim') is-invalid @enderror" value="{{ $mahasiswa->nim }}" name="nim" disabled/>
                    @error('nim')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $mahasiswa->nama }}" name="nama"/>
                    @error('nama')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Angkatan</label>
                  <input type="number" class="form-control @error('angkatan') is-invalid @enderror" value="{{ $mahasiswa->angkatan }}" name="angkatan"/>
                    @error('angkatan')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" value="{{ $mahasiswa->user->email }}" name="email"/>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" value="{{ $mahasiswa->status }}" name="status">
                    <option value="Aktif" @if($mahasiswa->status == 'Aktif') selected @endif >Aktif</option>
                    <option value="Tidak Aktif" @if($mahasiswa->status == 'Tidak Aktif') selected @endif>Tidak Aktif</option>
                    <option value="Cuti" @if($mahasiswa->status == 'Cuti') selected @endif>Cuti</option>
                    <option value="Lulus" @if($mahasiswa->status == 'Lulus') selected @endif>Lulus</option>
                  </select>
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