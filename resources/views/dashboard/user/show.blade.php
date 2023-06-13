@extends('dashboard.layouts.layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3><i class="fas fa-user-tie"></i> Detail User</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Detail User</li>
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
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info float-right"><i class="fas fa-edit"></i> Edit User</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Detail User<strong></td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Foto<strong></td>
                      <td width="80%"><img src="{{ $user->foto != null ? Storage::url($user->foto) : asset('img/user.png') }}" class="img-fluid" width="200px;"></td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Nama Lengkap<strong></td>
                      <td width="80%">{!! $user->name ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>No. KK<strong></td>
                      <td width="80%">{!! $user->no_kk ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>NIK<strong></td>
                      <td width="80%">{!! $user->nik ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Jenis Kelamin<strong></td>
                      <td width="80%">{!! $user->gender ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                    </tr>
                    @if ($user->role == 'penduduk')
                        <tr>
                        <td width="20%"><strong>Tempat Lahir<strong></td>
                        <td width="80%">{!! $user->tempat_lahir ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                        </tr>
                        <tr>
                        <td width="20%"><strong>Tanggal Lahir<strong></td>
                        <td width="80%">{!! $user->tanggal_lahir ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                        </tr>
                    @endif
                    <tr>
                      <td width="20%"><strong>Alamat Lengkap<strong></td>
                      <td width="80%">{!! $user->alamat ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                    </tr>
                    @if ($user->role == 'penduduk')
                    <tr>
                      <td width="20%"><strong>Pekerjaan<strong></td>
                      <td width="80%">{!! $user->pekerjaan ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                    </tr>
                    @endif
                    @if ($user->role == 'pegawai')
                    <tr>
                      <td width="20%"><strong>Jabatan<strong></td>
                      <td width="80%">{!! $user->jabatan ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                    </tr>
                    @endif
                    <tr>
                      <td width="20%"><strong>No. HP<strong></td>
                      <td width="80%">{!! $user->no_hp ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Email<strong></td>
                      <td width="80%">{!! $user->email ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
                    </tr>
                    <tr>
                      <td width="20%"><strong>Role<strong></td>
                      <td width="80%">{!! $user->role ?? '<p style="color: gray;">belum dilengkapi</p>'!!}</td>
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
