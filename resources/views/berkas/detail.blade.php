@section('js')
  <script>PDFObject.embed("{{ url('pendaftaran/transkrip/'.$berkas->transkrip)}}", "#transkrip");</script>
  <script>PDFObject.embed("{{ url('pendaftaran/surat_pengajuan/'.$berkas->surat_pengajuan)}}", "#surat_pengajuan");</script>
  <script>PDFObject.embed("{{ url('pendaftaran/surat_pembimbing/'.$berkas->surat_pembimbing)}}", "#surat_pembimbing");</script>
@stop
@section('css')
  <style>
    .pdfobject-container { height: 30rem; border: 1rem solid rgba(0,0,0,.1); }
  </style>
@stop
@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Berkas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="col-md-12">
          <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Detail Berkas</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <th>Nama Mahasiswa</th>
                        <td><strong>{{$berkas->mahasiswa->nama}}</strong></td>
                      </tr>
                      <tr>
                        <th>Transkrip</th>
                        <td>{{$berkas->transkrip}}</td>
                      </tr>
                      <tr>
                        <th>Surat Pengajuan Tugas Akhir</th>
                        <td>{{$berkas->surat_pengajuan}}</td>
                      </tr>
                      <tr>
                        <th>Surat Kesediaan Pembimbing</th>
                        <td>{{$berkas->surat_pembimbing}}</td>
                      </tr>
                      <tr>
                        <th>Verifikasi</th>
                        <td><strong>{{$berkas->verifikasi}}</strong></td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td>
                          <a href="{{route('berkas.index')}}" class="btn btn-success btn-sm"><i class="fas fa-caret-square-left"></i> Kembali</a>
                        </td>
                        <td></td>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.card-body -->
              </div>
          </div><!-- /.card -->
          <div class="card card-red">
            <div class="card-header">
              <h3 class="card-title">Transkrip</h3>
              <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="transkrip" width="100%" height="400px"></div>
            </div><!-- /.card-body -->
          </div>
          <div class="card card-red">
            <div class="card-header">
              <h3 class="card-title">Surat Pengajuan Tugas Akhir</h3>
              <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="surat_pengajuan" width="100%" height="400px"></div>
            </div><!-- /.card-body -->
          </div>
          <div class="card card-red">
            <div class="card-header">
              <h3 class="card-title">Surat Kesediaan Pembimbing</h3>
              <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="surat_pembimbing" width="100%" height="400px"></div>
            </div><!-- /.card-body -->
          </div>
        </div><!-- /.col -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
@endsection

