@extends('auth.layouts.layout')
@section('content')
<div class="login-box">
    <!--<div class="login-logo">
      <a href="#"><b>Desa Mangkujajar</b>Kabupaten Lamongan</a>
    </div>-->
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
      <div class="login-logo">
        <div class="brand-logo text-center">
          <img width="100" src="admin/foto/LOGO.png" alt="logo">
        </div>
      <a href="#"><b><center>Pelayanan Surat</center></b>Desa Mangkujajar</a>
    </div>
        <p class="login-box-msg">Silahkan masukkan username dan password anda!</p>
        <form action="{{ route('auth') }}" method="post">
            @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          @if (session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                <p>{{ session('loginError') }}</p>
            </div>
          @endif

          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit"  name="login" value="login" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection
