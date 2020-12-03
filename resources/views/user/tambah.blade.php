@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah User</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-plus-square"></i> Tambah User</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name"/>
                    @error('nama')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username"/>
                    @error('username')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Role</label>
                    <select id="role" name="role" class="form-control select2" value="{{ old('role') }}" required autocomplete="role" autofocus>
                        <option selected disabled></option>
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Admin">Admin</option>
                        <option value="Koordinator">Koordinator</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- /.form-group -->
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email"/>
                    @error('email')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password"/>
                    @error('password')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control"  name="password-confirm"/>
                    @error('email')<div class="text-danger">{{$message}}</div>@enderror
                </div>
                <!-- /.form-group -->
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
  </div>
@endsection