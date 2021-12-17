@push('scripts')
<script>
    function removeFromCart(id)
    {
        var data = new FormData(this.form);

        data.append("_token", "{{ csrf_token() }}");
        data.append('_method','DELETE');
        data.append('id',id);

        $.ajax({
            type: 'POST',
            url: "/customer/my-cart/"+id,
            data: data,
            processData: false,
            contentType: false,
            dataType: 'json',
            
            success: function(data){
                successToast(data.message);
            },

            complete: function(response){
                refreshTable();
            },

            error: function(xhr, status, data)
            {
                errorToast('Techincal Error!');
            }
            
        });
        e.preventDefault();
    }
</script>

@endpush