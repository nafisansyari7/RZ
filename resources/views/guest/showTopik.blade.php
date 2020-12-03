@section('js')
<script type="text/javascript">
$('.showTopik').click(function(){
    $('#modal').modal();
    var dosen = $(this).attr('data-dosen')
    var judul = $(this).attr('data-judul')
    var bidang = $(this).attr('data-bidang')
    var deskripsi = $(this).attr('data-deskripsi')
    var status = $(this).attr('data-status')
    $('#dosen').val(dosen)
    $('#judul').val(judul)
    $('#bidang').val(bidang)
    $('#deskripsi').val(deskripsi)
    $('#status').val(status)
})
</script>
@stop
@extends('layouts.app')
@section('content')
<div class="row">
 <div class="col-lg-12">
  <table class="table table-bordered table-hover">
   <thead>
    <tr>
     <th>Nama Dosen</th>
     <td><a id="dosen"></a></td>
    </tr>
    <tr>
     <th>Judul</th>
     <td><a id="judul">{{ $topik->judul }}</a></td>
    </tr>
    <tr>
     <th>Bidang</th>
     <td><a id="bidang">{{ $topik->bidang }}</a></td>
    </tr>
    <tr>
     <th>Deskripsi</th>
     <td><a id="deskripsi">{{ $topik->deskripsi }}</a></td>
    </tr>
    <tr>
     <th>Status</th>
     <td><a id="status">{{ $topik->status }}</a></td>
    </tr>
   </thead>
  </table>
 </div>
</div>
@endsection