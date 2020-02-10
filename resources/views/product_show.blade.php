<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			
			
			.shopinvest-block {
				border: 1px solid black;
				background: rgb(254,254,254);
				background: linear-gradient(180deg, rgba(254,254,254,1) 0%, rgba(241,241,241,1) 100%);
			}
        </style>
		<script
			  src="https://code.jquery.com/jquery-3.4.1.slim.js"
			  integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
			  crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
		<header class="container mb-3">
			<div class="row justify-content-between">
				<div class="col"><span class="shopinvest-block">LOGO</span></div>
				<div class="col">
					<aside class="shopinvest-block">
						Panier<br>
						1 article(s), 50 &euro;
					</aside>
				</div>
			</div>
		</header>
		<nav class="container mb-3">
			<div class="shopinvest-block px-3">
			@foreach ($nav as $nav_item)
				<span> &gt; {{ $nav_item->label }}</span>
			@endforeach
			</div>
		</nav>
		<section class="container">
			<div class="row no-gutters">
			<div class="col-6 ">
				<div class="tab-content">
				@foreach ( $product->imageAr as $index => $image )
					<img id="image-{{ $index }}" 
						class="shopinvest-block tab-pane @if ($loop->first) active @endif" 
						src="{{ asset('storage/image/'.$image->location) }}"
						role="tabpanel"
						style="max-width: 100%;"
					/>
				@endforeach
				</div>
				<ul class="row nav" role="tablist">
					@foreach ( $product->imageAr as $index => $image )
					<li>
						<a class="nav-link @if ($loop->first) active @endif"
							data-toggle="tab" href="#image-{{ $index }}" 
							role="tab"
						>
							<img src="{{ asset('storage/image/'.$image->location) }}" style="width:2em; max-height:2em" />
						</a>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="col-6">
				
				<div class="shopinvest-block mb-3">
					<div class="shopinvest-block float-right">
						{{ $product->price / 100 }}&nbsp;&euro;
					</div>
					<h1>{{ $product->label }}</h1>
					<span>{{ $product->brand->label }}</span>
					
				</div>
				<div class="shopinvest-block mb-3 px-3">
					<ul class="nav row align-items-stretch center"  id="myTab" role="tablist">
						<li class="col align-items-center shopinvest-block">
							<a class="nav-link active"
								 data-toggle="tab" href="#product-description" role="tab"
							>
								<span class="">Description</span>
							</a>
						</li>
						<li class="col shopinvest-block">
							<a class="nav-link"
								 data-toggle="tab" href="#product-livraison" role="tab"
							>
								Livraison
							</a>
						</li>
						<li class="col shopinvest-block">
							<a class="nav-link"
								 data-toggle="tab" href="#product-garanties"role="tab"
							>
								Garanties&nbsp;&amp; Paiement
							</a>
						</li>
					</ul>
					<div class="center py-3 tab-content">
						<div id="product-description" class="tab-pane active" role="tabpanel">
							{{ $product->description }}
						</div>
						<div id="product-livraison" class="tab-pane" role="tabpanel">
							livraison
						</div>
						<div id="product-garanties" class="tab-pane" role="tabpanel">
							garanties
						</div>
					</div>
				</div>
				
				<div>
					<span class="shopinvest-block">Quantit&#xE9;</span>
					<button class="shopinvest-block">-</button>
					<span class="shopinvest-block">{{ '1' }}</span>
					<button class="shopinvest-block">+</button>
					
					<button class="shopinvest-block">Ajouter au panier</button>
				</div>
			</div>
			</div>
		</section>
    </body>
</html>
