@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Upload Berkas</h1> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
      <div class="col-md-8">
        <div class="container-fluid">
      @if(Auth::user()->isAktif())
          @if(!Auth::user()->isBerkas())
        @if(!Auth::user()->isSudah())
          <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>Info</h5>
            Berkas Anda telah masuk, tunggu verifikasi dari Admin. <br>Untuk cek status verifikasi dapat dilihat pada <a href="{{url('/')}}">halaman depan</a>
          </div>
          @endif
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><i class="far fa-plus-square"></i> Upload Berkas</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
            <form action="{{ route('berkas.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <input id="mahasiswa_id" type="hidden" name="mahasiswa_id" value="{{ Auth::user()->mahasiswa->id }}" required readonly="">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label>Transkrip Nilai (NIM Anda-Transkrip.pdf)</label>
                      <input type="file" class="form-control" name="transkrip" required=""/>
                  </div>
                  <div class="form-group">
                      <label>Surat Pengajuan Tugas Akhir (NIM Anda-Pengajuan.pdf)</label>
                      <input type="file" class="form-control" name="surat_pengajuan" required=""/>
                  </div>
                  <div class="form-group">
                      <label>Surat Kesediaan Pembimbing (NIM Anda-Pembimbing.pdf)</label>
                      <input type="file" class="form-control" name="surat_pembimbing" required=""/>
                  </div>
                </div>
              </div><!-- /.row -->
            <a><b>Catatan :</b> Pastikan nama File sudah sesuai dan menggunakan format PDF</a>
            </div><!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Upload</button>
            </div>
          </form>
          </div><!-- /.card -->
          @else
          <div class="alert alert-info">
            <h5><i class="icon fas fa-exclamation-triangle"></i>Info</h5>
            Berkas Anda Sudah diverifikasi 
            <img src="{{url('images/check.png')}}" width="100%">
          </div>
          @endif
        @else
          <div class="alert alert-danger alert-dismissable">
            <h5><i class="icon fas fa-exclamation-triangle"></i>Info</h5>
            Status Anda saat ini tidak aktif, silahkan melapor ke Admin
            <img src="{{url('images/uncheck.png')}}" width="100%">
          </div>
        </div>
        @endif
        </div><!-- /.container-fluid -->
      </div><!-- /.col -->
    </section><!-- /.content -->
    
@endsection
