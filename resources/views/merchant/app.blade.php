@include('merchant.layout.head')
<body class="hold-transition sidebar-mini layout-fixed text-sm layout-navbar-fixed">
<div class="wrapper">

  @include('merchant.layout.sidebar')

	@section('main-content')
		@show

	  @include('merchant.layout.footer')

	  <!-- Control Sidebar -->
	  <aside class="control-sidebar control-sidebar-dark">
	    <!-- Control sidebar content goes here -->
	  </aside>
	  <!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->
	
@include('merchant.layout.foot')