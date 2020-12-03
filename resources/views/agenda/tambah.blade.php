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
            <h3 class="card-title"><i class="far fa-plus-square"></i> Tambah Jadwal Sidang</h3>
          </div><!-- /.card-header -->
          <div class="card-body">
    <form action="{{ route('agenda.store')}}" method="POST">
    @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Judul</label>
                  <select class="form-control select2" name="tugasakhir_id" required>
                    <option selected disabled>Pilih Judul</option>
                    @foreach($tugasakhir as $row)
                      <option value="{{$row->id}}">{{$row->judul}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Waktu</label>
                  <input type="time" class="form-control @error('waktu') is-invalid @enderror" value="{{ old('waktu') }}" name="waktu"/>
                      @error('waktu')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" name="tanggal"/>
                      @error('tanggal')<div class="text-danger">{{$message}}</div>@enderror
                </div>
              </div><!-- /.col -->

              <div class="col-md-6">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" name="status">
                    <option selected disabled>Pilih</option>
                    <option value="Seminar Proposal" {{ old('status') == 'Seminar Proposal' ? 'selected' : '' }}>Seminar Proposal</option>
                    <option value="Sidang Tugas Akhir" {{ old('status') == 'Sidang Tugas Akhir' ? 'selected' : '' }}>Sidang Tugas Akhir</option>
                    </select>
                  @error('status')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                  <label>Ruangan</label>
                  <input type="text" class="form-control @error('ruang') is-invalid @enderror" value="{{ old('ruang') }}" name="ruang"/>
                    @error('ruang')<div class="text-danger">{{$message}}</div>@enderror
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
    </section><!-- /.content -->
@endsection
