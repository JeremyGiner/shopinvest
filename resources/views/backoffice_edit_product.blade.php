<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Back offices - update product</title>

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
	<h2>{{ $product->label }}</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	
	<form action="{{ route('backoffice.update_product') }}" method="POST">
		{{ csrf_field() }}
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="label" value="{{ $product->label }}" />
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea name="description">{{ $product->description }}</textarea>
		</div>
		<div class="form-group">
			<label>Price(in cent)</label>
			<input type="number" name="price" value="{{ $product->price }}" />
		</div>
		<div class="form-group">
			<label>Brand</label>
			<select name="brand_id">
				@foreach ($brandAr as $brand)
				<option value="{{$brand->id}}"
					@if ($brand->id == $product->brand_id)
						selected
					@endif
				>
					{{ $brand->label}}
				</option>
				@endforeach
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
	<hr/>
	<h2>Image(s) of {{ $product->label }}</h2>
	@foreach ($product->imageAr as $image)
	<form action="{{ route('backoffice.delete_product_image') }}" method="POST">
		<img src="{{ asset('storage/image/'.$image->location) }}" style="width:2em; max-height:2em" />
		<input type="hidden" name="product_id" value="{{ $product->id }}">
		<input type="hidden" name="image_id" value="{{ $image->id }}">
		<button type="submit" class="btn btn-primary">Remove</button>
	</form>
	@endforeach
	<form action="{{ route('backoffice.create_product_image') }}" method="POST">
		<input type="hidden" name="product_id" value="{{ $product->id }}">
		<input type="file" name="image[]" 
			accept="image/png, image/jpeg"
			multiple
		/>
		<button type="submit" class="btn btn-primary">Add</button>
	</form>
	
</body>
</html>
