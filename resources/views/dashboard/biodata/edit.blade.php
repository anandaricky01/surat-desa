@extends('dashboard.layouts.layout')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3><i class="fas fa-edit"></i> Edit Biodata</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('biodata') }}">Biodata</a></li>
                <li class="breadcrumb-item active">Edit Biodata</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Biodata {{ auth()->user()->role }}</h3>
          <div class="card-tools">
            <a href="{{ route('biodata') }}" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
          </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        </br>
        @if (session()->has('danger'))
            <div class="col-sm-10">
                <div class="alert alert-danger" role="alert">{!! session('danger') !!}</div>
            </div>
        @endif

        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('biodata.update') }}">
            @csrf
          <div class="card-body">
            <div class="form-group row">
              <label for="foto" class="col-sm-12 col-form-label"><span class="text-info">
              <i class="fas fa-user-circle"></i> <u>Biodata {{ auth()->user()->role }}</u></span></label>
            </div>
            <div class="form-group row">
              <label for="foto" class="col-sm-3 col-form-label">Foto</label>
              <div class="col-sm-7">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="foto" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}">
                @error('name')
                    <p style="color: red">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-3 col-form-label">No. KK</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="no_kk" id="no_kk" value="{{ auth()->user()->no_kk }}">
                @error('no_kk')
                    <p style="color: red">{{ $message }}</p>
                @enderror
                </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-3 col-form-label">NIK</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="nik" id="nik" value="{{ auth()->user()->nik }}">
                @error('nik')
                    <p style="color: red">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="level" class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-7">
                <select class="form-control" id="gender" name="gender">
                  <option value="L" {{ auth()->user()->gender == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                  <option value="P" {{ auth()->user()->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>
              @error('gender')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            @if (auth()->user()->role == 'penduduk')
                <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Tempat Lahir</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ auth()->user()->tempat_lahir }}">
                    @error('tempat_lahir')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                </div>
                <div class="form-group row">
                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-7">
                    <div class="input-group date">
                    <input type="text" class="form-control" name="tanggal_lahir" id="datepicker-year" autocomplete="off"
                    value="{{ auth()->user()->tanggal_lahir }}" data-date-format="yyyy-mm-dd">
                        <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                    </div>
                </div>
                @error('tanggal_lahir')
                    <p style="color: red">{{ $message }}</p>
                @enderror
                </div>
            @endif
            <div class="form-group row">
              <label for="nama" class="col-sm-3 col-form-label">Alamat Lengkap</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ auth()->user()->alamat }}">
                @error('alamat')
                    <p style="color: red">{{ $message }}</p>
                @enderror
              </div>
            </div>
            @if (auth()->user()->role == 'penduduk')
                <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Pekerjaan</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{ auth()->user()->pekerjaan }}">
                    @error('pekerjaan')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                </div>
            @endif
            @if (auth()->user()->role == 'pegawai')
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Jabatan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ auth()->user()->jabatan }}">
                        @error('jabatan')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            @endif
            <div class="form-group row">
              <label for="nama" class="col-sm-3 col-form-label">No. HP</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ auth()->user()->no_hp }}">
                @error('no_hp')
                    <p style="color: red">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="username" id="username" value="{{ auth()->user()->username }}">
                @error('username')
                    <p style="color: red">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}">
                @error('email')
                    <p style="color: red">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
            </div>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->

      </section>
      <!-- /.content -->
@endsection
