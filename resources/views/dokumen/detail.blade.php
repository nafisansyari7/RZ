@section('js')
  <script>PDFObject.embed("{{ url('dokumen/'.$acuan->berkas)}}", "#berkas");</script>
@stop
@section('css')
  <style>
    .pdfobject-container { height: 40rem; border: 1rem solid rgba(0,0,0,.1); }
  </style>
@stop
@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Dokumen</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">{{$acuan->keterangan}}</h3>
              <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="berkas" width="100%" height="800px"></div>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
@endsection

