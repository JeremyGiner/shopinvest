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
	<table class="table">
		<tbody>
		@foreach ($brandAr as $brand)
		<tr>
			<td>{{ $brand->label }}</td>
		</tr>
		@endforeach
	</table>
	
	<h1>Create Post</h1>

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
</body>
</html>
