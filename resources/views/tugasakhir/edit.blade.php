@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Tugas Akhir</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-plus-square"></i> Edit Tugas Akhir</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <form action="{{route('tugasakhir.update', $tugasakhir)}}" method="POST">
              @method('PUT')
              @csrf
                <div class="form-group">
                  <label>Nama Mahasiswa</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $tugasakhir->mahasiswa->nama }}" name="nama" disabled/>
                    @error('nama')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Judul</label>
                  <textarea class="form-control @error('judul') is-invalid @enderror" name="judul" rows="3" >{{ $tugasakhir->judul }}</textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Bidang</label>
                  <select class="form-control select2" value="{{ $tugasakhir->bidang }}" name="bidang">
                    <option selected disabled>Pilih bidang</option>
                    <option value="Sumber Daya Air" @if($tugasakhir->bidang == 'Sumber Daya Air') selected @endif>Sumber Daya Air<Geoteknik/option>
                    <option value="Geoteknik" @if($tugasakhir->bidang == 'Geoteknik') selected @endif>Geoteknik</option>
                    <option value="Manajemen Konstruksi"@if($tugasakhir->bidang == 'Manajemen Konstruksi') selected @endif>Manajemen Konstruksi</option>
                    <option value="Struktur" @if($tugasakhir->bidang == 'Struktur') selected @endif>Struktur</option>
                    <option value="Jalan Raya dan Transportasi" @if($tugasakhir->bidang == 'Jalan Raya dan Transportasi') selected @endif>Jalan Raya dan Transportasi</option>
                  </select>
                  @error('bidang')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" value="{{ $tugasakhir->status }}" name="status">
                    <option value="Proposal" @if($tugasakhir->status == 'Proposal') selected @endif>Proposal</option>
                    <option value="Tugas Akhir" @if($tugasakhir->status == 'Tugas Akhir') selected @endif>Tugas Akhir</option>
                    <option value="Revisi Tugas Akhir" @if($tugasakhir->status == 'Revisi Tugas Akhir') selected @endif>Revisi Tugas Akhir</option>
                    <option value="Selesai" @if($tugasakhir->status == 'Selesai') selected @endif>Selesai</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Catatan</label>
                  <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan" rows="2">{{ $tugasakhir->catatan }}</textarea>
                    @error('catatan')<div class="text-danger">{{$message}}</div>@enderror
                </div>
              </div><!-- /.col -->
              <div class="col-md-6">
              <div class="form-group">
                    <label>No. HP</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" value="{{$tugasakhir->no_hp}}" name="no_hp"/>
                  </div>
                <div class="form-group">
                  <label>Tanggal Daftar</label>
                  <input type="text" class="form-control @error('tanggal_daftar') is-invalid @enderror" value="{{ $tugasakhir->tanggal_daftar }}" name="tanggal_daftar" disabled/>
                </div>
                <div class="form-group">
                  <label>Tanggal Seminar Proposal</label>
                  <input type="date" class="form-control @error('tanggal_sempro') is-invalid @enderror" value="{{ $tugasakhir->tanggal_sempro }}" name="tanggal_sempro"/>
                </div>
                <div class="form-group">
                  <label>Tanggal Sidang Akhir</label>
                  <input type="date" class="form-control @error('tanggal_sidang') is-invalid @enderror" value="{{ $tugasakhir->tanggal_sidang }}" name="tanggal_sidang"/>
                </div>
                <div class="form-group">
                  <label>Tanggal Pengumpulan Revisi</label>
                  <input type="date" class="form-control @error('pengumpulan_revisi') is-invalid @enderror" value="{{ $tugasakhir->pengumpulan_revisi }}" name="pengumpulan_revisi"/>
                </div>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card-body -->
          <div class="card-footer">
            <input type="hidden" name="id" value="{{$tugasakhir->id}}" >
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
    </form>
        </div><!-- /.card -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
@endsection