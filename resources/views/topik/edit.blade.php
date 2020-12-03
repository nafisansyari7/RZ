@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Topik</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-plus-square"></i> Edit Topik</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
    <form action="{{route('topik.update', $topik)}}" method="POST">
    @method('PUT')
    @csrf
                <div class="form-group">
                  <label>Nama Dosen</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $topik->dosen->nama }}" name="nama" disabled/>
                    @error('nama')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Topik</label>
                  <textarea class="form-control @error('judul') is-invalid @enderror" name="judul" rows="3" >{{ $topik->judul }}</textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Bidang</label>
                  <select class="form-control select2" value="{{ $topik->bidang }}" name="bidang">
                    <option selected disabled>Pilih bidang</option>
                    <option value="Sumber Daya Air" @if($topik->bidang == 'Sumber Daya Air') selected @endif>Sumber Daya Air</option>
                    <option value="Geoteknik" @if($topik->bidang == 'Geoteknik') selected @endif>Geoteknik</option>
                    <option value="Manajemen Konstruksi "@if($topik->bidang == 'Manajemen Konstruksi') selected @endif>Manajemen Konstruksi</option>
                    <option value="Struktur" @if($topik->bidang == 'Struktur') selected @endif>Struktur</option>
                    <option value="Jalan Raya dan Transportasi" @if($topik->bidang == 'Jalan Raya dan Transportasi') selected @endif>Jalan Raya dan Transportasi</option>
                  </select>
                  @error('bidang')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" value="{{ $topik->status }}" name="status">
                    <option value="Belum Diambil" @if($topik->status == 'Belum Diambil') selected @endif >Belum Diambil</option>
                    <option value="Sudah Diambil" @if($topik->status == 'Sudah Diambil') selected @endif>Sudah Diambil</option>
                  </select>
                </div>
              </div><!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="9">{{ $topik->deskripsi }}</textarea>
                    @error('deskripsi')<div class="text-danger">{{$message}}</div>@enderror
                </div>
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