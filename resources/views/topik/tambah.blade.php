@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Topik</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-plus-square"></i> Tambah Topik</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
    <form action="{{ route('topik.store')}}" method="POST">
    @csrf
                <input id="dosen_id" type="hidden" name="dosen_id" value="{{ Auth::user()->dosen->id }}" required readonly="">
                <div class="form-group">
                  <label>Nama Dosen</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ Auth::user()->dosen->nama }}" name="nama" disabled/>
                    @error('nama')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                  <label>Topik</label>
                  <textarea class="form-control @error('judul') is-invalid @enderror" name="judul" rows="2">{{ old('judul') }}</textarea>
                    @error('judul')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                  <label>Bidang</label>
                  <select class="form-control select2" name="bidang">
                    <option selected disabled>Pilih bidang</option>
                    <option value="Sumber Daya Air" {{ old('bidang') == 'Sumber Daya Air' ? 'selected' : '' }}>Sumber Daya Air</option>
                    <option value="Geoteknik" {{ old('bidang') == 'Geoteknik' ? 'selected' : '' }}>Geoteknik</option>
                    <option value="Manajemen Konstruksi" {{ old('bidang') == 'Manajemen Konstruksi' ? 'selected' : '' }}>Manajemen Konstruksi</option>
                    <option value="Struktur" {{ old('bidang') == 'Struktur' ? 'selected' : '' }}>Struktur</option>
                    <option value="Jalan Raya dan Transportasi" {{ old('bidang') == 'Jalan Raya dan Transportasi' ? 'selected' : '' }}>Jalan Raya dan Transportasi</option>
                  </select>
                  @error('bidang')<div class="text-danger">{{$message}}</div>@enderror
                </div>
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="9">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')<div class="text-danger">{{$message}}</div>@enderror
                </div>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
    </form>
        </div><!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
