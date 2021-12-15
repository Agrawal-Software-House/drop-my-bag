@if (Auth::guard('customer')->check() && commanHelper::GET_CURRENT_CUSTOMER()->cart()->where('product_id',$product->id)->first())

@else

<div class="form-group col-md flex-grow-0">
    <div class="input-group mb-3 input-spinner">

        <div class="input-group-prepend">
        <button class="btn btn-light" 


        onclick="
            var q = Number($('#quantity').val()) + 1;
            $('#quantity').val(q);
        " 
        
        type="button" id="button-plus"> + </button>
        </div>

        <input type="text" class="form-control" value="1" name="quantity" id="quantity">

        <div class="input-group-append">
        <button class="btn btn-light" 
        onclick="
            var q = Number($('#quantity').val());
            if(q > 1)
            {
                var q = q - 1;
                $('#quantity').val(q);
            }
        " 
        type="button" id="button-minus"> &minus; </button>
        </div>
    </div>


</div> <!-- col.// -->

@endif