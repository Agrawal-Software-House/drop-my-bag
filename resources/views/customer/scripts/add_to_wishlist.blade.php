@push('scripts')
<script>
	function add_to_wishlist(id)
	{
		var loggedIn = {{ Auth::guard('customer')->check() ? 'true' : 'false' }};
		if (loggedIn)
		{
				var data = new FormData(this.form);
				data.append("_token", "{{ csrf_token() }}");
				data.append('id',id);
				$.ajax({
				  type: 'POST',
				  url: "{{ route('customer.wishlist.store') }}",
				  data: data,
				  processData: false,
				  contentType: false,
				  dataType: 'json',
				  success: function(data){
				  	successToast('Added Successfully!!');
				  	location.reload();

				  },
				  complete: function(response){

			      },
				  error: function(xhr, status, data)
				  {
				  	errorToast('Techincal Error!');
				  }
				  
				});
				e.preventDefault();
		}
		else
		{
			errorToast('Please login or signup to add this item to add to wishlist');
		}
	}
</script>
@endpush