@extends('dashboard.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3><i class="fas fa-user-tie"></i> Data User</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"> Data User</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  User</h3>
                  <div class="card-tools">
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-info float-right">
                    <i class="fas fa-plus"></i> Tambah  User</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <div class="col-md-12">
                    <form method="" action="{{ route('user.index') }}">
                      <div class="row">
                          <div class="col-md-4 bottom-10">
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') ?? '' }}">
                          </div>
                          <div class="col-md-5 bottom-10">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                          </div>
                      </div><!-- .row -->
                    </form>
                  </div><br>
                @if (session()->has('success'))
                    <div class="col-sm-12">
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    </div>
                @endif
                @if (session()->has('danger'))
                    <div class="col-sm-12">
                        <div class="alert alert-danger" role="alert">{{ session('danger') }}</div>
                    </div>
                @endif
                <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th width="20%">Nama</th>
                          <th width="20%">Username</th>
                          <th width="25%">Email</th>
                          <th width="15%">Level</th>
                          <th width="15%"><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ !request()->has('page') ? $loop->iteration : (request('page') == 1 ? $loop->iteration : (request('page') - 1) * $loop->iteration + 5) }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</th>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td align="center">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="#" id="delete-link-{{ $user->id }}" class="btn btn-xs btn-warning" onclick="showConfirmation('{{ $user->id }}', '{{ $user->name }}')">
                                    <i class="fas fa-trash" title="Hapus"></i>
                                  </a>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('user.delete', $user->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('delete')
                                    <!-- Tambahkan input token CSRF jika diperlukan -->
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>

                                <script>
                                function showConfirmation(id, name) {
                                    if (confirm(`Apakah kamu yakin ingin menghapus data ${name}?`)) {
                                        document.getElementById(`delete-form-${id}`).submit();
                                    }
                                }
                                </script>

                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    {{-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> --}}
                    {{ $users->links('vendor.pagination.bootstrap-5') }}
                  </ul>
                </div>
              </div>
              <!-- /.card -->

      </section>
      <!-- /.content -->
@endsection
