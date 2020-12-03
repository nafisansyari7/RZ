@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Sidang</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-plus-square"></i> Edit Jadwal Sidang</h3>
          </div><!-- /.card-header -->
          <div class="card-body">
    <form action="{{ route('agenda.update',$agenda->id)}}" method="POST">
    @csrf
    @method('PUT')
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control" value="{{ $agenda->tugasakhir->judul }}" name="tugasakhir_id" disabled/>
                </div>
                <div class="form-group">
                  <label>Waktu</label>
                  <input type="time" class="form-control @error('waktu') is-invalid @enderror" value="{{ $agenda->waktu }}" name="waktu"/>
                      @error('waktu')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control @error('tanggal') is-invalid @enderror" value="{{ $agenda->tanggal}}" name="tanggal"/>
                      @error('tanggal')<div class="text-danger">{{$message}}</div>@enderror
                </div>
              </div><!-- /.col -->

              <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2" value="{{ $agenda->status }}" name="status">
                        <option value="Seminar Proposal" @if($agenda->status == 'Seminar Proposal') selected @endif >Seminar Proposal</option>
                        <option value="Sidang Tugas Akhir" @if($agenda->status == 'Sidang Tugas Akhir') selected @endif>Sidang Tugas Akhir</option>
                    </select>
                </div>
                <div class="form-group">
                  <label>Ruangan</label>
                  <input type="text" class="form-control @error('ruang') is-invalid @enderror" value="{{ $agenda->ruang}}" name="ruang"/>
                    @error('ruang')<div class="text-danger">{{$message}}</div>@enderror
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
@endsection
