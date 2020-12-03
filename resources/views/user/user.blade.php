@extends('layouts.home')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- <div class="card-header">
            <a href="{{route('user.create')}}" class="btn btn-sm btn-primary" style="color:white"><i class="far fa-plus-square"></i> Tambah</a>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Email</th>
                    @if(Auth::user()->role == 'Admin')
                    <th>Password</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->username}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->email}}</td>
                    @if(Auth::user()->role == 'Admin')
                    <td>
                      <form action="{{ route('resetPassword', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin reset password User ini?')">Reset</button>
                      </form>
                    </td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div><!-- /.card-body -->
            <div class="card-footer">
                <a><b>Catatan :</b> Jika Password telah direset maka password akan berubah menjadi "<b><font color="#009BFF">tekniksipil</font></b>"</a>
            </div>
          </div><!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.row -->

    </section><!-- /.content -->
@endsection