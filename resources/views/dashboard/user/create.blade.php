@extends('dashboard.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3><i class="fas fa-plus"></i> Tambah User</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="user.php">Data User</a></li>
            <li class="breadcrumb-item active">Tambah User</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data User</h3>
            <div class="card-tools">
                <a href="user.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        </br>
        @if (session()->has('danger'))
            <div class="col-sm-10">
                <div class="alert alert-danger" role="alert">Maaf data nama wajib di isi</div>
            </div>
        @endif
        <form class="form-horizontal" method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-user-circle"></i> <u>Data User</u></span></label>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Foto </label>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nik" id="nik" value="{{ old('nik') }}">
                        @error('nik')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">No. KK</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="no_kk" id="no_kk" value="{{ old('no_kk') }}">
                        @error('no_kk')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat') }}">
                        @error('alamat')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">No. HP</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="jurusan" name="gender">
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('gender')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                        @error('email')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
                        @error('username')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="password" id="password" value="">
                        @error('password')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-sm-3 col-form-label">Level</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="jurusan" name="role">
                            <option value="penduduk">Penduduk</option>
                            <option value="pegawai">Pegawai</option>
                            <option value="admin">Admin</option>
                        </select>
                        @error('role')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
            </div>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->
</section>
<!-- /.content -->
@endsection
