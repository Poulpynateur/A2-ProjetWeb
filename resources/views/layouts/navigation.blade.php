{{-- Navigation bar, present everywhere on the website --}}
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a class="navbar-brand" href="{{ route('Acceuil') }}">
		<img src="{{ asset('img/navlogo.png') }}" width="50" height="50" class="d-inline-block align-top" alt="Logo BDE">
		<h5 id="logonav"><b>BDE</b> CESI</h5>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav navbarFont">
			<li class="nav-item">
				<a class="nav-link mx-1" href="{{ route('Evenements') }}">
					<span class="far fa-calendar mx-1"></span> Événements
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link mx-1" href="{{ route('Boite à idées') }}"><span class="far fa-lightbulb mx-1"></span> Boîte à idées</a>
			</li>
			<li class="nav-item">
				<a class="nav-link mx-1" href="{{ route('Boutique') }}"><span class="fas fa-shopping-cart mx-1"></span> Boutique</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			@auth
				<li><h5 class="mr-3">Bonjour {{ Auth::user()->firstname }}</h5></li>
				<li>
					<a href="{{ route('Panier')}}" class="navbarFont mr-3">
						@if(App\Models\Site\Order::numberOfGoodies())
							<span class="notifiy-bubule bg-danger">{{App\Models\Site\Order::numberOfGoodies()}}</span>
						@endif
						<span class="fas fa-cart-arrow-down"></span> Panier
					</a>
				</li>
				<li>
					@if(Auth::user()->role->name === 'Membre BDE')
						<a class="mr-3 navbarFont" href="{{ route('Admin') }}">
							@if(App\Http\Controllers\AdminController::totalReported())
								<span class="notifiy-bubule bg-danger">{{App\Http\Controllers\AdminController::totalReported()}}</span>
							@endif
						<span class="fas fa-user-cog mx-1"></span> Administration
						</a>
					@endif
				</li>
				<li><a class="navbarFont" href="{{ url('/logout') }}">Se déconnecter</a></li>
			@else
				<li><a href="{{ route('login') }}" class="navbarFont mr-3">Se connecter</a></li>
				<li>
					@if (Route::has('register'))
						<a href="{{ route('register') }}" class="navbarFont">S'inscrire</a>
					@endif
				</li>
			@endauth
		</ul>
	</div>
</nav>