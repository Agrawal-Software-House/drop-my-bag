@push('scripts')	
	<script type="text/javascript">
		function submitform()
		{
			$("#productSearchForm").submit();
		}

		$("input[name='sub_category'").on('change', function(){
			submitform();
		});

		$("input[name='returnable'").on('change', function(){
			submitform();
		});

		$("input[name='brand[]'").on('change', function(){
			submitform();
		});
		
	</script>
@endpush	