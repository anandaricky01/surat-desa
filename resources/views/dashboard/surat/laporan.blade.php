@extends('dashboard.layouts.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-book"></i> Laporan Surat Masuk</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"> Laporan Surat Masuk</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row align-items-start">
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sedang Diproses</span>
                    <span class="info-box-number">{{ $sedang_diproses }}</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Surat Diacc</span>
                    <span class="info-box-number">{{ $acc }}</span>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Surat Tidak Diacc</span>
                    <span class="info-box-number">{{ $tidak_acc }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Request</h3>
            <div class="card-tools">
                {{-- <a href="tambahbuku.php" class="btn btn-sm btn-info float-right">
                    <i class="fas fa-plus"></i> Tambah Buku</a> --}}
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-12">
                <form method="" action="">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                            <input type="text" class="form-control" id="search" name="search"
                                placeholder="Cari Nama, NIK, Jenis Surat...">
                        </div>
                        <div class="col-md-5 bottom-10">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp;
                                Search</button>
                        </div>
                    </div><!-- .row -->
                </form>

            </div><br>
            <div class="col-sm-12">
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif

                @if (session()->has('danger'))
                <div class="alert alert-danger" role="alert">{{ session('danger') }}</div>
                @endif
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th width="10%">Tanggal</th>
                        <th width="10%">Jenis Surat</th>
                        <th width="10%">NIK</th>
                        <th width="10%">Nama Pengirim</th>
                        <th width="10%">Keterangan</th>
                        <th width="10%">Status</th>
                        <th width="10%">
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surats as $surat)
                    <tr>
                        <td>{{ !request()->has('page') ? $loop->iteration : (request('page') == 1 ? $loop->iteration :
                            $loop->iteration + (request('page') - 1) * $perPage) }}</td>
                        <td>{{ $surat->created_at }}</td>
                        <td>{{ $surat->jenis_surat }}</td>
                        <td>{{ $surat->user->nik }}</td>
                        <td>{{ $surat->user->name }}</td>
                        <td>{{ $surat->keterangan ?? 'Pengajuan Surat Kematian' }}</td>
                        <td>
                            <center>
                                @if ($surat->status == 'sedang diproses')
                                <span class="rounded bg-warning px-2 py-1">{{
                                    $surat->status }}</span>
                                @elseif($surat->status == 'acc')
                                <span class="rounded bg-primary px-2 py-1">{{
                                    $surat->status }}</span>
                                @else
                                <span class="rounded bg-danger px-2 py-1">{{
                                    $surat->status }}</span>
                                @endif
                            </center>
                        </td>
                        <td align="center">
                            <a @if ($surat->jenis_surat == 'Surat Pengantar KTP')
                                href="{{ route('detail_pengantar_ktp', $surat->id) }}"
                                @elseif($surat->jenis_surat == 'Surat Keterangan Tidak Mampu')
                                href="{{ route('detail_sktm', $surat->id) }}"
                                @else
                                href="{{ route('detail_surat_kematian', $surat->id) }}"
                                @endif
                                class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i> Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $surats->links('vendor.pagination.bootstrap-5') }}
            {{-- <ul class="pagination pagination-sm m-0 float-right"> --}}
                {{-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> --}}
                {{--
            </ul> --}}
        </div>

        {{-- {{ $surats->links('vendor.pagination.bootstrap-5') }} --}}
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection
