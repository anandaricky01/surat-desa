@extends('dashboard.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-edit"></i> Form Pengajuan SKTM</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Form Pengajuan SKTM</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Pengajuan SKTM</h3>
            <div class="card-tools">
                <a href="{{ route('dashboard') }}" class="btn btn-sm btn-warning float-right"><i
                        class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        </br>
        <div class="col-sm-10">
            @if (session()->has('danger'))
                <div class="alert alert-danger" role="alert">{{ session('danger') }}</div>
            @endif
        </div>
        <form class="form-horizontal" method="post" action="{{ route('kirim_sktm') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="foto" class="col-sm-12 col-form-label"><span class="text-info">
                            <i class="fas fa-user-circle"></i> <u>Data Pemohon</u></span></label>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">No. KK</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="no_kk" id="no_kk" value="{{ auth()->user()->no_kk }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nik" id="nik" value="{{ auth()->user()->nik }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="gender" id="jenis_kelamin">
                            <option value="L">Laki-Laki</option>
                            <option value="L">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ auth()->user()->tempat_lahir }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-7">
                        <div class="input-group date">
                            <input type="text" class="form-control" name="tanggal_lahir" id="datepicker-year" data-date-format="yyyy-mm-dd"
                                autocomplete="off" value="{{ auth()->user()->tanggal_lahir }}">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="alamat" id="alamat" value="{{ auth()->user()->alamat }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{ auth()->user()->pekerjaan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">No. HP</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ auth()->user()->no_hp }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="keterangan" id="keterangan" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Upload Scan KTP</label>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="scan_ktp" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Upload Scan KK</label>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="scan_kk" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i>
                            Simpan</button>
                    </div>
                </div>
                <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->

    <!-- /.card -->

</section>
<!-- /.content -->
@endsection
