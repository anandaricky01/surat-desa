<!DOCTYPE html>
<html>
<head>
@include('dashboard.layouts.components.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('dashboard.layouts.components.header')

@include('dashboard.layouts.components.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  @include('dashboard.layouts.components.footer')

</div>
<!-- ./wrapper -->

@include('dashboard.layouts.components.script')
</body>
</html>
