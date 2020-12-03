@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cog"></i> Profil</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form action="{{route('updateEmail')}}" method="POST">
                  @method('PUT')
                  @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{Auth::user()->email}}" name="email"/>
                      @error('email')<div class="text-danger">{{$message}}</div>@enderror
                  </div>
              </div><!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>
            </div><!-- /.card -->
          </div><!--/.col (left) -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cog"></i> Pengaturan Password</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form method="POST" action="{{ route('change.password') }}">
              @csrf 
                @foreach ($errors->all() as $error)
                  <p class="text-danger">{{ $error }}</p>
                @endforeach 
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"/>
                    @error('password')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                
                <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="new_password"/>
                    @error('password')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                
                <div class="form-group">
                  <label>Re-type Password Baru</label>
                  <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password"/>
                    @error('new_confirm_password')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                
              </div><!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div><!-- /.card -->
          </div><!--/.col (left) -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
@endsection