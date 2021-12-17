@extends('customer.account.app')


@section('profile-content')

<a href="{{ route('customer.my-address.create') }}" class="btn btn-light mb-3"> <i class="fa fa-plus"></i> Add new address </a>

<div class="row">
    @foreach (commanHelper::GET_CURRENT_CUSTOMER()->address as $address)
        <div class="col-md-6">
            <article class="box mb-4">
                <h6>{{$address->name}} ,{{$address->phone_number}}</h6>
                <p>{{$address->address}}, {{$address->city}}, {{$address->state}}</p>
                <h6>{{$address->zip}}</h6>

                @if ($address->active == 1)
                    <a href="javascript:void(0);" class="btn btn-light disabled"> <i class="fa fa-check"></i> Default</a>
                @else
                    <a onclick="make_address_default('{{Crypt::encryptString($address->id)}}')" class="btn btn-light">Make default</a> 
                @endif

                <a href="{{ route('customer.my-address.edit',$address) }}" class="btn btn-light"> 
                    <i class="fa fa-pen"></i> 
                </a>   
                <a onclick="remove_address('{{Crypt::encryptString($address->id)}}');" class="btn btn-light"> 
                    <i class="text-danger fa fa-trash"></i>  
                </a>
                
            </article>
        </div>
    @endforeach
</div> <!-- row.// -->


@push('scripts')
<script>
    function make_address_default(id)
    {
        var data = new FormData(this.form);

        data.append("_token", "{{ csrf_token() }}");
        data.append('_method','PUT');

        data.append('default_button',1);
        data.append('id',id);

        $.ajax({
            type: 'POST',
            url: "/customer/my-address/"+id,
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


    function remove_address(id)
    {
        var data = new FormData(this.form);

        data.append("_token", "{{ csrf_token() }}");
        data.append('_method','DELETE');
        data.append('id',id);

        $.ajax({
            type: 'POST',
            url: "/customer/my-address/"+id,
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

@endsection