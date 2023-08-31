<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    {{-- <h5 class="brand-name">
                        TrendTrov
                    </h5> --}}
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('admin/images/nvlogo.png') }} "
                        style="width: 150px;height:60px;border-radius: 40px;color:blue"/>
                    </a>

                </div>
                <div class="col-md-5 my-auto">
                    <form role="search" action="{{ url('search') }}" method="GET">
                        <div class="input-group">
                            <input type="search" name="search" value="{{ Request::get('search') }}" placeholder="Chercher Votre Produit" class="form-control" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('Cart') }}">
                                <i class="fa fa-shopping-cart"></i> Carte (<livewire:frontend.cart.cart-count />)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('Wishlist') }}">
                                <i class="fa fa-heart"></i> Wishlist (<livewire:frontend.wishlist-count />)
                            </a>
                        </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('S`inscrire') }}</a>
                            </li>
                        @endif
                    @else


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>  {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profil</a></li>
                            <li><a class="dropdown-item" href="{{ url('orders') }}"><i class="fa fa-list"></i> Mes commandes</a></li>
                            <li><a class="dropdown-item" href="{{ url('Wishlist') }}"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a class="dropdown-item" href="{{ url('Cart') }}"><i class="fa fa-shopping-cart"></i> Ma Carte</a></li>
                            <li>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 <i class="fa fa-sign-out"></i>{{ __('Déconnexion') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                            </li>
                            </ul>
                        </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                TrendTrove
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections') }}"> Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/nouveautés') }}">Nouveautés </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/Offre') }}">Offre Du Jour</a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Electronics</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Fashions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accessoires</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Appliances</a>
                    </li> --}}
                </ul>
                <a href="{{ url("/") }}" style="float:right;color:white;font-weight:bold;" class="btn">Laivraison Gratuite Sur Le Premier Achat</a>
            </div>
        </div>
    </nav>
</div>
