{{-- Template for the 3 most sold articles --}}
<div class="jumbotron h-100 d-flex flex-column p-4">
    <h1 class="display-4">{{ $bestSeller->name }}</h1>
    <div class="shop-img">
        <img class="w-100" src="{{ $bestSeller->image }}" alt="{{ $bestSeller->name }}">
    </div>
    <hr class="my-4 ml-0 mr-0">
    <p class="lead">{{ $bestSeller->description }}</p>
    <div class="row mt-2">
        <div class="col"><p>Prix : {{ $bestSeller->price }} €</p></div>
        <div class="col text-right"><p>Stock : {{ $bestSeller->stock }}</p></div>
    </div>
    @auth
    <div class="row">
        <div class="col-4">
            <button type="button" class="btn btn-primary w-100" onclick="addToCart({{ $bestSeller->id }}, '#shop-product-best-quantity-{{ $bestSeller->id }}')"><i class="fas fa-cart-plus"></i></button>
        </div>
        <div class="col-8">
            <input type="number" class="form-control input-number" id="shop-product-best-quantity-{{ $bestSeller->id }}" value="1" min="1" max="{{ $bestSeller->stock }}">
        </div>
    </div>
    @endauth
</div>