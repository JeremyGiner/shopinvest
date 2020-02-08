<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Back offices</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<style>
		
		.shopinvest-block {
			border: 1px solid black;
			background: rgb(254,254,254);
			background: linear-gradient(180deg, rgba(254,254,254,1) 0%, rgba(241,241,241,1) 100%);
		}
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<h2>List of Brand</h2>
	<table class="table">
		<tbody>
		@foreach ($brandAr as $brand)
		<tr>
			<td>{{ $brand->label }}</td>
		</tr>
		@endforeach
	</table>
	
	<h2>Create Post</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	
	<form action="{{ route('backoffice.create_brand') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="label" placeholder="Brand" />
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
	
	<hr/>
	
	<h2>List of Product</h2>
	<table class="table">
		<tbody>
		@foreach ($productAr as $product)
		<tr>
			<td>{{ $product->label }}</td>
			<td>
				<a class="btn btn-success" href="{{ route( 'backoffice.edit_product', [ 'id' => $product->id ] ) }}">
					Edit
				</a>
			</td>
			<td>
				<a class="btn btn-primary" href="{{ route( 'product.show', [ 'id' => $product->id, 'name' => $product->getSlug() ] ) }}">
					View page
				</a>
			</td>
			<td>
				<form action="{{ route('backoffice.delete_product') }}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $product->id }}" />
				<button class="btn btn-danger" type="submit">Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
	
	<h2>Create Product</h2>
	<form id="form_create_product" 
		action="{{ route('backoffice.create_product') }}" 
		method="POST"
		enctype="multipart/form-data"
	>
		{{ csrf_field() }}
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="label" placeholder="Name" />
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea name="description"></textarea>
		</div>
		<div class="form-group">
			<label>Price(in cent)</label>
			<input type="number" name="price" value="1000" />
		</div>
		<div class="form-group">
			<label>Brand</label>
			<select name="brand_id">
				@foreach ($brandAr as $brand)
				<option value="{{$brand->id}}">{{ $brand->label}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Image(s)</label>
			<input type="file" name="image[]" 
				accept="image/png, image/jpeg"
				multiple
			/>
			<p>Try selecting more than one file when browsing for files.</p>
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
	
</body>
</html>
