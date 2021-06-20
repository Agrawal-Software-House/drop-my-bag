<table class="table table-borderd text-center">
	<tbody>
		<tr>
			<th>Product Name</th>
			<td>{{$product->product_name}}</td>
		</tr>

		<tr>
			<th>Category</th>
			<td>{{$product->category->name}}</td>
		</tr>

		<tr>
			<th>Sub Category</th>
			<td>{{$product->subCategory->name}}</td>
		</tr>

		<tr>
			<th>Brand Name</th>
			<td>{{$product->brand_name}}</td>
		</tr>

		<tr>
			<th>MRP Price</th>
			<td>{{$product->mrp_price}}</td>
		</tr>

		<tr>
			<th>Selling Price</th>
			<td>{{$product->selling_price}}</td>
		</tr>

		<tr>
			<th>Piece</th>
			<td>{{$product->piece}}</td>
		</tr>

		<tr>
			<th>Returnable</th>
			<td>{{$product->returnable}}</td>
		</tr>

		<tr>
			<th>Image</th>
			<td>
				<img src="/storage/{{$product->product_image}}" style="height: 100px;" alt="">
			</td>
		</tr>
	</tbody>
</table>

<hr>

<div class="text-left">
	<h4 class="font-weight-bold" style="color: red;">Specification</h4>
	{!! htmlspecialchars_decode($product->specification) !!}
</div>