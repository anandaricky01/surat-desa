@extends('dashboard.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-edit"></i> Form Pengajuan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Form Pengajuan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Pengajuan Surat
                Keterangan Kematian</h3>
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
        <form class="form-horizontal" method="post" action="{{ route('kirim_surat_kematian') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="foto" class="col-sm-12 col-form-label"><span class="text-info">
                            <i class="fas fa-user-circle"></i> <u>Data Pemohon</u></span></label>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">No. KK</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="no_kk" id="no_kk" value="{{ old('no_kk') }}">
                        @error('no_kk')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nik" id="nik" value="{{ old('nik') }}">
                        @error('nik')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="gender" name="gender">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('gender')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Umur</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="umur" id="umur" value="{{ old('umur') }}">
                        @error('umur')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Meninggal</label>
                    <div class="col-sm-7">
                        <div class="input-group date">
                            <input type="text" class="form-control" name="tanggal_meninggal" id="datepicker-year"
                                data-date-format="yyyy-mm-dd" autocomplete="off" value="{{ old('tanggal_meninggal') }}">
                                @error('tanggal_meninggal')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Tempat</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="tempat_meninggal" id="tempat_meninggal" value="{{ old('tempat_meninggal') }}">
                        @error('tempat_meninggal')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Disebabkan karena</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="sebab_meninggal" id="sebab_meninggal" value="{{ old('sebab_meninggal') }}">
                        @error('sebab_meninggal')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Upload Scan KTP</label>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="scan_ktp" id="customFile">
                            @error('scan_ktp')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
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

</section>
<!-- /.content -->
@endsection
