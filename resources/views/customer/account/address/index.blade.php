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
                    <a href="#" class="btn btn-light disabled"> <i class="fa fa-check"></i> Default</a>
                @else
                    <a href="#" class="btn btn-light">Make default</a> 
                @endif

                <a href="{{ route('customer.my-address.edit',$address) }}" class="btn btn-light"> 
                    <i class="fa fa-pen"></i> 
                </a>   
                <a href="#" class="btn btn-light"> 
                    <i class="text-danger fa fa-trash"></i>  
                </a>
                
            </article>
        </div>
    @endforeach
</div> <!-- row.// -->

@endsection