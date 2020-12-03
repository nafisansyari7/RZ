@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Dokumen</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    
    <section class="content">
      <div class="col-md-6">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><i class="far fa-plus-square"></i> Tambah Dokumen</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
            <form action="{{ route('acuan.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" name="keterangan"/>
                      @error('keterangan')<div class="text-danger">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group">
                      <label>Dokumen (*.pdf)</label>
                      <input type="file" class="form-control" name="berkas" required=""/>
                  </div>
                  </div>
              </div><!-- /.row -->
            </div><!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
          </div><!-- /.card -->
        </div><!-- /.container-fluid -->
      </div><!-- /.col -->
    </section><!-- /.content -->
    
@endsection
