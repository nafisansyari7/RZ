@section('js')
  <script>PDFObject.embed("{{ url('/petunjuk/admin.pdf')}}", "#admin");</script>
@stop
@section('css')
  <style>
    .pdfobject-container { height: 35rem;  solid rgba(0,0,0,.1); }
  </style>
@stop
@extends('layouts.home')
@section('content')

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
              <div id="admin" width="100%" height="800px"></div>
        
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
@endsection

