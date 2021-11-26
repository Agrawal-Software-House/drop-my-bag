<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
{{-- <script src="/admin/plugins/jszip/jszip.min.js"></script> --}}
{{-- <script src="/admin/plugins/pdfmake/pdfmake.min.js"></script> --}}
<script src="/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script src="{{ asset('admin/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{ asset('admin/toast-master/toastr.js')}}"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<script>

  function warningToast(text,heading)
  {
      $.toast({
          heading: heading,
          text: text,
          position: 'top-right',
          loaderBg: '#ff6849',
          icon: 'warning',
          hideAfter: 3500,
          stack: 6
      });


  }
  function successToast(text,heading)
  {
      $.toast({
          heading: heading,
          text: text,
          position: 'top-right',
          loaderBg: '#ff6849',
          icon: 'success',
          hideAfter: 3500,
          stack: 6
      });


  }
  function errorToast(text,heading)
  {
      $.toast({
          heading: heading,
          text: text,
          position: 'top-right',
          loaderBg: '#ff6849',
          icon: 'error',
          hideAfter: 3500,
          stack: 6
      });
  }
</script>


<!-- Bootstrap 4 -->
<script src="/admin/dropify/dist/js/dropify.min.js"></script>
<script>
	$(document).ready(function() {
		//swtich
		$("input[data-bootstrap-switch]").each(function(){
	      $(this).bootstrapSwitch('state', $(this).prop('checked'));
	    })


	    // Basic
	    $('.dropify').dropify();

	    // Translated
	    $('.dropify-fr').dropify({
	        messages: {
	            default: 'Glissez-déposez un fichier ici ou cliquez',
	            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
	            remove: 'Supprimer',
	            error: 'Désolé, le fichier trop volumineux'
	        }
	    });

	    // Used events
	    var drEvent = $('#input-file-events').dropify();

	    drEvent.on('dropify.beforeClear', function(event, element) {
	        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
	    });

	    drEvent.on('dropify.afterClear', function(event, element) {
	        alert('File deleted');
	    });

	    drEvent.on('dropify.errors', function(event, element) {
	        console.log('Has Errors');
	    });

	    var drDestroy = $('#input-file-to-destroy').dropify();
	    drDestroy = drDestroy.data('dropify')
	    $('#toggleDropify').on('click', function(e) {
	        e.preventDefault();
	        if (drDestroy.isDropified()) {
	            drDestroy.destroy();
	        } else {
	            drDestroy.init();
	        }
	    })
	});
</script>
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/admin/dist/js/pages/dashboard.js"></script>


@stack('custom-scripts')

</body>
</html>
