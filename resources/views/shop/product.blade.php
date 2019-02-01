{{-- The template display for a common article --}}
<div id="shop-goodie-{{ $goodie->id }}" class="card m-3" style="height:750px">
	<input class="shop-goodie" type="hidden" data-goodie='["{{ $goodie->id }}","{{ $goodie->name }}","{{ $goodie->price }}","{{ $goodie->category->category }}"]'>
	<div class="shop-img">
		<img class="w-100" src="{{ $goodie->image }}" alt="{{ $goodie->name }}">
	</div>
	<div class="card-body d-flex flex-column">
		<h2 class="card-title">{{ $goodie->name }}</h2>
		<p class="card-text description">{{ $goodie->description }}</p>
		<hr class="my-4 ml-0 mr-0">
		
		<div class="row mt-2">
			<div class="col"><p>Prix : {{ $goodie->price }} €</p></div>
			<div class="col text-right"><p>Stock : {{ $goodie->stock }}</p></div>
		</div>
		@auth
		<div class="row">
			<div class="col-4">
				{{-- The cart button, with the function to add it directly --}}
				<button type="button" class="btn btn-primary w-100" onclick="addToCart({{ $goodie->id }},'#shop-product-quantity-{{ $goodie->id }}')"><i class="fas fa-cart-plus"></i></button>
			</div>
			<div class="col-8">
				<input type="number" class="form-control input-number" id="shop-product-quantity-{{ $goodie->id }}" value="1" min="1" max="{{ $goodie->stock }}">
			</div>
		</div>
		@endAuth
	</div>
</div>