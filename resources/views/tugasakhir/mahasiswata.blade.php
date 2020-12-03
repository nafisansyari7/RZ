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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
      @if(!Auth::user()->isTugasAkhir())
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Deskripsi Tugas Akhir</h2>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th width="30%">Judul</th>
                    <th width="10%">Dosen Pembimbing</th>
                    <th width="5%">Status</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($tugasakhir as $ta)
                  <tr>
                    <td>{{$ta->judul}}</td>
                    <td> 
                      <ol style="padding-left: 10px;">
                      @if(!is_null($ta->pembimbing))
                          @foreach($ta->pembimbing as $pembimbing)
                        @if(!is_null($pembimbing->dosen))
                            <li>{{ $pembimbing->dosen->nama }}</li>
                        @endif
                          @endforeach
                        @endif
                        </ol>
                      </td>
                      <td>
                        @if($ta->status == 'Mendaftar')
                          <label class="btn btn-xs btn-default">Mendaftar</label>
                        @elseif($ta->status == 'Proposal')
                          <label class="btn btn-xs btn-info">Proposal</label>
                        @elseif($ta->status == 'Tugas Akhir')
                          <label class="btn btn-xs btn-success">Tugas Akhir</label>
                        @elseif($ta->status == 'Revisi Tugas Akhir')
                          <label class="btn btn-xs btn-warning">Revisi Tugas Akhir</label>
                        @elseif($ta->status == 'Selesai')
                          <label class="btn btn-xs btn-primary">Selesai</label>
                        @endif
                      </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
          
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Riwayat</h2>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table">
                <tbody>
                  <tr>
                    <th>Tanggal Daftar</th>
                    @foreach($tugasakhir as $ta)
                    
                      @if($ta->tanggal_daftar == '')
                      <td>Belum</td>
                      @else
                      <td>{{date('D, d M Y', strtotime($ta->tanggal_daftar))}}</td>
                      @endif
                    @endforeach
                  </tr>
                  <tr>
                    <th>Tanggal Seminar Proposal</th>
                    @foreach($tugasakhir as $ta)
                    
                      @if($ta->tanggal_sempro == '')
                      <td>Belum</td>
                      @else
                      <td>{{date('D, d M Y', strtotime($ta->tanggal_sempro))}}</td>
                      @endif
                    @endforeach
                  </tr>
                  <tr>
                    <th>Tanggal Sidang Akhir</th>
                    @foreach($tugasakhir as $ta)
                    
                      @if($ta->tanggal_sidang == '')
                      <td>Belum</td>
                      @else
                      <td>{{date('D, d M Y', strtotime($ta->tanggal_sidang))}}</td>
                      @endif
                    @endforeach
                  </tr>
                  <tr>
                    <th>Tanggal Pengumpulan Revisi</th>
                    @foreach($tugasakhir as $ta)
                    
                      @if($ta->pengumpulan_revisi == '')
                      <td>Belum</td>
                      @else
                      <td>{{date('D, d M Y', strtotime($ta->pengumpulan_revisi))}}</td>
                      @endif
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.row -->
      @else
          <div class="col-md-8">
            <div class="alert alert-info alert-dismissable">
              <h5><i class="icon fas fa-exclamation-triangle"></i>Info</h5>
              Anda belum mendaftar Tugas Akhir
              <img src="{{url('/public/images/uncheck.png')}}" width="100%">
            </div>
          </div>
        @endif
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
    @endsection