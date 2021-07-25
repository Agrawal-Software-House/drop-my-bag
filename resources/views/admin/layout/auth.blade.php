<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DropMyBag | Admin - Dashboard</title>

  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<style>
  body
  {
    /*font-family: 'Poppins', sans-serif !important;*/
    font-family: 'Roboto', sans-serif !important;
  }
	.login-page, .register-page {

	  background-image: url("/admin/loginbg.jpeg"); /* The image used */
	      height: 100vh; /* You must set a specified height */
	      background-position: center; /* Center the image */
	      background-repeat: no-repeat; /* Do not repeat the image */
	      background-size: cover; /* Resize the background image to cover the entire container */
	  }

  .help-block
  {
    color: red !important;
  }
</style>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card p-3">
		  <div class="login-logo mt-3">
		    <a href="/">
		      <img src="/logo/dmbF4.png" alt="Site logo" style="height: 70px;">
		    </a>
		  </div>
		  <div class="card-body login-card-body">
		  	@section('content')
		  		@show
		  </div>
		</div>

		
	</div>


	
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/admin/dist/js/adminlte.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
</body>
</html>
