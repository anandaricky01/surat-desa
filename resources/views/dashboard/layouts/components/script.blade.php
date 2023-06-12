<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>

<script src="{{ asset('admin/dist/js/global.js') }}"></script>
<!-- CKEditor -->
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('editor1', { filebrowserImageBrowseUrl: 'kcfinder' });
  CKEDITOR.replace('editor2', { filebrowserImageBrowseUrl: 'kcfinder' });

</script>
<!-- bootstrap datepicker -->
<script src="{{ asset('admin/datepicker/js/bootstrap-datepicker.js') }}"></script>
<script>
  //Date picker
  $('#datepicker-year').datepicker();
</script>
