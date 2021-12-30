<!-- ========================= FOOTER ========================= -->
<footer class="section-footer bg-secondary">
	<div class="container">
		<section class="footer-top padding-y-lg text-white">
			<div class="row">

				<aside class="col-md col-6">
					<a href="/" class="brand-wrap">
						<img class="logo" src="/logo/dmbF5.png" style="max-height: 150px; height: 70px !important;">
					</a> 
					<p class="mt-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
				</aside>

				<aside class="col-md col-6">
					<h6 class="title">Company</h6>
					<ul class="list-unstyled">
						<li> <a href="#">About us</a></li>
						<li> <a href="#">Career</a></li>
						<li> <a href="#">Rules and terms</a></li>
						<li> <a href="#">Sitemap</a></li>
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Help</h6>
					<ul class="list-unstyled">
						<li> <a href="#">Contact us</a></li>
						<li> <a href="#">Money refund</a></li>
						<li> <a href="#">Order status</a></li>
						<li> <a href="#">Shipping info</a></li>
					</ul>
				</aside>
				<aside class="col-md col-6">
					<h6 class="title">Account</h6>
					<ul class="list-unstyled">
						<li> <a href="{{ route('customer.login') }}"> User Login </a></li>
						<li> <a href="{{ route('customer.register') }}"> User register </a></li>
						<li> <a href="{{ route('customer.setting') }}"> Account Setting </a></li>
						<li> <a href="{{ route('customer.orders.index') }}"> My Orders </a></li>
					</ul>
				</aside>
				<aside class="col-md">
					<h6 class="title">Social</h6>
					<ul class="list-unstyled">
						<li><a href="#"> <i class="fab fa-facebook"></i> Facebook </a></li>
						<li><a href="#"> <i class="fab fa-twitter"></i> Twitter </a></li>
						<li><a href="#"> <i class="fab fa-instagram"></i> Instagram </a></li>
						<li><a href="#"> <i class="fab fa-youtube"></i> Youtube </a></li>
					</ul>
				</aside>
			</div> <!-- row.// -->
		</section>	<!-- footer-top.// -->

		<section class="footer-bottom text-center">
		
				<p class="text-white">Privacy Policy - Terms of Use - User Information Legal Enquiry Guide</p>
				<p class="text-muted"> &copy 2021 DropMyBag, All rights reserved. <br>
				 Design & Developed by <a  style="color: white;" href="https://agrawalsoftwarehouse.com/">Agrawal Software House</a>
				</p>
				<br>
		</section>
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->

<script src="/admin/plugins/jquery/jquery.min.js"></script>
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="{{ asset('admin/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{ asset('admin/toast-master/toastr.js')}}"></script>

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



@stack('scripts')


</body>
</html>