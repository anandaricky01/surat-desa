@extends('dashboard.layouts.layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3><i class="fas fa-user-tie"></i> Biodata {{ auth()->user()->role }}</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Biodata</li>
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
                <a href="{{ route('biodata.edit') }}" class="btn btn-sm btn-info float-right"><i class="fas fa-edit"></i> Edit Biodata</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="col-sm-12">
                        <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                    </div>
                @endif
              <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Biodata Penduduk<strong></td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Foto<strong></td>
                      <td width="80%"><img src="{{ Storage::url(auth()->user()->foto) }}" class="img-fluid" width="200px;"></td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Nama Lengkap<strong></td>
                      <td width="80%">{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>No. KK<strong></td>
                      <td width="80%">{{ auth()->user()->no_kk }}</td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>NIK<strong></td>
                      <td width="80%">{{ auth()->user()->nik }}</td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Jenis Kelamin<strong></td>
                      <td width="80%">{{ auth()->user()->gender }}</td>
                    </tr>
                    @if (auth()->user()->role == 'penduduk')
                        <tr>
                        <td width="20%"><strong>Tempat Lahir<strong></td>
                        <td width="80%">{{ auth()->user()->tempat_lahir }}</td>
                        </tr>
                        <tr>
                        <td width="20%"><strong>Tanggal Lahir<strong></td>
                        <td width="80%">{{ auth()->user()->tanggal_lahir }}</td>
                        </tr>
                    @endif
                    <tr>
                      <td width="20%"><strong>Alamat Lengkap<strong></td>
                      <td width="80%">{{ auth()->user()->alamat }}</td>
                    </tr>
                    @if (auth()->user()->role == 'penduduk')
                    <tr>
                      <td width="20%"><strong>Pekerjaan<strong></td>
                      <td width="80%">{{ auth()->user()->pekerjaan }}</td>
                    </tr>
                    @endif
                    @if (auth()->user()->role == 'pegawai')
                    <tr>
                      <td width="20%"><strong>Jabatan<strong></td>
                      <td width="80%">{{ auth()->user()->jabatan }}</td>
                    </tr>
                    @endif
                    <tr>
                      <td width="20%"><strong>No. HP<strong></td>
                      <td width="80%">{{ auth()->user()->no_hp }}</td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Email<strong></td>
                      <td width="80%">{{ auth()->user()->email }}</td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">&nbsp;</div>
          </div>
          <!-- /.card -->

  </section>
@endsection
