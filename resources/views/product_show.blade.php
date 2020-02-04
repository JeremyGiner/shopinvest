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
			<div class="col-6">
				@foreach ( $product->imageAr as $image )
					<img class="shopinvest-block d-block" src="{{ $image->location }}" />
				@endforeach
				<div class="row">
				@foreach ( $product->imageAr as $image )
					<div class="col-3">
						<img class="shopinvest-block d-block" src="{{ $image->location }}" />
					</div>
				@endforeach
				</div>
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
					<div class="row align-items-stretch center">
						<a href="/" class="shopinvest-block col d-flex align-items-center">
							<span class="">Description</span>
						</a>
						<a href="/" class="shopinvest-block col d-flex align-items-center">
							Livraison
						</a>
						<a href="/" class="shopinvest-block col d-flex align-items-center">
							Garanties&nbsp;&amp; Paiement
						</a>
						<span class="col">
					</div>
					<div class="center py-3">
						Texte
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
