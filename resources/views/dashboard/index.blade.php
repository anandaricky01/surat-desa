@extends('dashboard.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3><i class="nav-icon fas fa-th"></i> Dashboard</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $sktm }}</h3>

                  <p>Surat Keterangan Tidak Mampu</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                @if (auth()->user()->role == 'penduduk')
                    <a href="{{ route('sktm') }}" class="small-box-footer">Pengajuan <i class="fas fa-arrow-circle-right"></i></a>
                @endif
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $pengantar_ktp }}<sup style="font-size: 20px"></sup></h3>

                  <p>Surat Pengantar Pembuatan KTP</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                @if (auth()->user()->role == 'penduduk')
                <a href="{{ route('pengantar_ktp') }}" class="small-box-footer">Pengajuan <i class="fas fa-arrow-circle-right"></i></a>
                @endif
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $surat_kematian }}</h3>

                  <p>Surat Keterangan Kematian</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                @if (auth()->user()->role == 'penduduk')
                <a href="suratkematian.php" class="small-box-footer">Pengajuan <i class="fas fa-arrow-circle-right"></i></a>
                @endif
              </div>
            </div>
              </div>
              <!-- /.card -->

      </section>
      <!-- /.content -->
@endsection
