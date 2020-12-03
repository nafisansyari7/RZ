@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Tugas Akhir</h1>
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
                  <h3 class="card-title">Detail Tugas Akhir</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <th width="">Nama Mahasiswa</th>
                        <td><strong>{{$tugasakhir->mahasiswa->nama}}</strong></td>
                      </tr>
                      <tr>
                        <th>NIM</th>
                        <td>{{$tugasakhir->mahasiswa->nim}}</td>
                      </tr>
                      <tr>
                        <th>Pembimbing</th>
                        <td>
                          <ol style="padding-left: 15px;">
                          @if(!is_null($tugasakhir->pembimbing))
                              @foreach($tugasakhir->pembimbing as $pembimbing)
                            @if(!is_null($pembimbing->dosen))
                                <li>{{ $pembimbing->dosen->nama }}</li>
                            @endif
                              @endforeach
                            @endif
                          </ol>
                        </td>
                      </tr>
                      <tr>
                        <th>Judul</th>
                        <td>{{$tugasakhir->judul}}</td>
                      </tr>
                      <tr>
                        <th>Bidang</th>
                        <td>{{$tugasakhir->bidang}}</td>
                      </tr>
                      <tr>
                        <th>No. Hp</th>
                        <td>{{$tugasakhir->no_hp}}</td>
                      </tr>
                      <tr>
                        <th>Status</th>
                        <td><strong>{{$tugasakhir->status}}</strong></td>
                      </tr>
                      <tr>
                        <th>Tanggal Daftar</th>
                        <td>{{date('D, d M Y', strtotime($tugasakhir->tanggal_daftar))}}</td>
                      </tr>
                      <tr>
                        <th>Tanggal Seminar Proposal</th>
                        @if($tugasakhir->tanggal_sempro == '')
                        <td></td>
                        @else
                        <td>{{date('D, d M Y', strtotime($tugasakhir->tanggal_sempro))}}</td>
                        @endif
                      </tr>
                      <tr>
                        <th>Tanggal Sidang Akhir</th>
                        @if($tugasakhir->tanggal_sidang == '')
                        <td></td>
                        @else
                        <td>{{date('D, d M Y', strtotime($tugasakhir->tanggal_sidang))}}</td>
                        @endif
                      </tr>
                      <tr>
                        <th>Tanggal Pengumpulan Revisi</th>
                        @if($tugasakhir->pengumpulan_revisi == '')
                        <td></td>
                        @else
                        <td>{{date('D, d M Y', strtotime($tugasakhir->pengumpulan_revisi))}}</td>
                        @endif
                      </tr>
                      <tr>
                        <th>Catatan</th>
                        <td>{{$tugasakhir->catatan}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.card-body -->
                @if(Auth::user()->role !== 'Mahasiswa')
              <div class="card-footer">
                <a href="{{route('tugasakhir.index')}}" class="btn btn-success btn-sm"><i class="fas fa-caret-square-left"></i> Kembali</a>
              </div>
            @endif
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
@endsection

