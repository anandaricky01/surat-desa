@extends('dashboard.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-user-tie"></i> Detail SKTM</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    @if (auth()->user()->role == 'pegawai')
                        <li class="breadcrumb-item"><a href="{{ route('permohonan_surat_masuk') }}">Permohonan Surat Masuk</a></li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ route('status_request') }}">Status Request</a></li>
                    @endif
                    <li class="breadcrumb-item active">Detail SKTM</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                @if (auth()->user()->role == 'pegawai')
                    <a href="{{ route('permohonan_surat_masuk') }}" class="btn btn-sm btn-warning float-right">
                        <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    <a href="{{ route('status_request') }}" class="btn btn-sm btn-info float-right">
                        <i class="fas fa-check"></i> Acc</a>
                    <a href="{{ route('status_request') }}" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-times" title="Hapus"></i> Tidak Acc</a>
                @else
                    <a href="{{ route('status_request') }}" class="btn btn-sm btn-warning float-right">
                        <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                @endif
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><strong>Scan Kartu Keluarga<strong></td>
                        <td><img src="{{ Storage::url($sktm->scan_kk) }}" class="img-fluid" width="200px;"></td>
                    </tr>
                    <tr>
                        <td><strong>Scan KTP<strong></td>
                        <td><img src="{{ Storage::url($sktm->scan_ktp) }}" class="img-fluid" width="200px;"></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Foto Pengirim<strong></td>
                        <td width="80%"><img src="{{ $sktm->user->foto != null ? Storage::url($sktm->user->foto) : asset('img/user.png') }}" class="img-fluid" width="200px;"></td>
                      </tr>
                    <tr>
                        <td width="20%"><strong>Nama Pengirim<strong></td>
                        <td width="80%">{{ $sktm->user->name }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>NIK<strong></td>
                        <td width="80%">{{ $sktm->user->nik }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>NO. KK<strong></td>
                        <td width="80%">{{ $sktm->user->no_kk }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Tanggal Lahir<strong></td>
                        <td width="80%">{{ $sktm->user->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Alamat<strong></td>
                        <td width="80%">{{ $sktm->user->alamat }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>NO. HandPhone<strong></td>
                        <td width="80%">{{ $sktm->user->no_hp }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Jenis Kelamin<strong></td>
                        <td width="80%">{{ $sktm->user->gender == 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Pekerjaan<strong></td>
                            <td width="80%">{{ $sktm->user->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Jenis Surat<strong></td>
                        <td width="80%">{{ $sktm->jenis_surat }}</td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Status<strong></td>
                        <td width="80%">
                            @if ($sktm->status == 'sedang diproses')
                            <span
                                style="padding: 2px 8px; background-color: #F7DC6F; border-radius: 10px; color: #000; font-weight: bold;">{{
                                $sktm->status }}</span>
                            @elseif($sktm->status == 'acc')
                            <span
                                style="padding: 2px 8px; background-color: #3498DB; border-radius: 10px; color: #000; font-weight: bold;">{{
                                $sktm->status }}</span>
                            @else
                            <span
                                style="padding: 2px 8px; background-color: #E74C3C; border-radius: 10px; color: #FFF; font-weight: bold;">{{
                                $sktm->status }}</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">&nbsp;</div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection
