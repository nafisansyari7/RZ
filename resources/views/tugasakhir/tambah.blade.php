
@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Tugas Akhir</h1> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        @if(Auth::user()->isBerkas())
          @if(Auth::user()->isTugasAkhir())
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-plus-square"></i> Daftar Tugas Akhir</h3>
          </div><!-- /.card-header -->
          <div class="card-body">
          <form action="{{ route('tugasakhir.store')}}" method="POST">
          @csrf
              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label>NIM</label>
                  <input type="hidden" class="form-control" value="{{ Auth::user()->mahasiswa->id }}" name="mahasiswa_id"  readonly/>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" value="{{ Auth::user()->mahasiswa->nim }}" name="nim"  disabled/>
                  </div>
                  
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ Auth::user()->mahasiswa->nama }}" name="nama" disabled/>
                  </div>
                  <div class="form-group">
                    <label>Angkatan</label>
                    <input type="text" class="form-control @error('angkatan') is-invalid @enderror" value="{{ Auth::user()->mahasiswa->angkatan }}" name="angkatan" disabled/>
                  </div>

                  <div class="form-group">
                    <label>Pembimbing</label>
                    <select class="form-control select2" style="width: 100%;"  name="pembimbing" >
                      <option selected disabled>Pilih Dosen</option>
                      @foreach($dosen as $row)
                        <option value="{{$row->id}}">{{$row->nama}}</option>
                      @endforeach
                    </select>
                    @error('pembimbing')<div class="text-danger">{{$message}}</div>@enderror
                    <input type="hidden" name="dosen_id1">
                    <input type="hidden" name="status1" value="Pembimbing">
                  </div>

                  <div class="form-group">
                    <label>Co. Pembimbing</label>
                    <select class="form-control select2" style="width: 100%;"  name="co_pembimbing">
                      <option selected disabled>Pilih Dosen</option>
                        <option value="">Tidak ada</option>
                      @foreach($dosen as $row)
                        <option value="{{$row->id}}">{{$row->nama}}</option>
                      @endforeach
                    </select>
                    <input type="hidden" name="dosen_id2">
                    <input type="hidden" name="status2" value="Co. Pembimbing">
                  </div>
                </div><!-- /.col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Judul</label>
                    <textarea class="form-control @error('judul') is-invalid @enderror" name="judul" rows="3">{{ old('judul') }}</textarea>
                      @error('judul')<div class="text-danger">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label>Bidang</label>
                    <select class="form-control select2" style="width: 100%;"  name="bidang">
                      <option selected disabled>Pilih bidang</option>
                      <option value="Sumber Daya Air" {{ old('bidang') == 'Sumber Daya Air' ? 'selected' : '' }}>Sumber Daya Air</option>
                      <option value="Geoteknik" {{ old('bidang') == 'Geoteknik' ? 'selected' : '' }}>Geoteknik</option>
                      <option value="Manajemen Konstruksi" {{ old('bidang') == 'Manajemen Konstruksi' ? 'selected' : '' }}>Manajemen Konstruksi</option>
                      <option value="Struktur" {{ old('bidang') == 'Struktur' ? 'selected' : '' }}>Struktur</option>
                      <option value="Jalan Raya dan Transportasi" {{ old('bidang') == 'Jalan Raya dan Transportasi' ? 'selected' : '' }}>Jalan Raya dan Transportasi</option>
                    </select>
                    @error('bidang')<div class="text-danger">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                    <label>No. HP</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" name="no_hp"/>
                      @error('no_hp')<div class="text-danger">{{$message}}</div>@enderror
                  </div>
                </div><!-- /.col -->
              </div><!-- /.row -->
              <a><b>Catatan :</b> Pastikan data sudah Benar sebelum Anda klik tombol Daftar</a>
            </div><!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
          </form>
        </div><!-- /.card -->
            @else
            <div class="col-md-8">
              <div class="alert alert-info alert-dismissable">
                <h5><i class="icon fas fa-exclamation-triangle"></i>Info</h5>
                Anda sudah Mendaftar, cek <a href="{{route('mahasiswaTA')}}">Tugas Akhir</a>
                <img src="{{url('/public/images/check.png')}}" width="100%">
              </div>
            </div>
            @endif
          @else
          <div class="col-md-8">
            <div class="alert alert-info alert-dismissable">
              <h5><i class="icon fas fa-exclamation-triangle"></i>Info</h5>
              Berkas Anda Belum diverifikasi
              <img src="{{url('/public/images/uncheck.png')}}" width="100%">
            </div>
          </div>
          @endif
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
@endsection