@push('scripts')
<script>
    function removeFromWishlist(id)
    {
        var data = new FormData(this.form);

        data.append("_token", "{{ csrf_token() }}");
        data.append('_method','DELETE');
        data.append('id',id);

        $.ajax({
            type: 'POST',
            url: "/customer/wishlist/"+id,
            data: data,
            processData: false,
            contentType: false,
            dataType: 'json',
            
            success: function(data){
                successToast(data.message);
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
</script>

@endpush