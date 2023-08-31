<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h3 style="color:rgb(215, 15, 15);font-weight:bolder"> <i class="fa fa-cart-shopping fa-bounce"></i> Ma Carte:</h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 style="color: blue;font-weight:bold">Produits</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 style="color: blue;font-weight:bold">Prix</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 style="color: blue;font-weight:bold">Quantité</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 style="color: blue;font-weight:bold">Prix Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 style="color: blue;font-weight:bold">Supprimer</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($cart as $cartItem )


                        <div class="cart-item">
                            @if ($cartItem->product)


                            <div class="row">
                                <div class="col-md-4 my-auto">
                                    <a href="{{ url('collections/'.$cartItem->product->categorie->Slug.'/'.$cartItem->product->Slug) }}">
                                        <label class="product-name">
                                            @if ($cartItem->product->productImages)
                                            <img src="{{ asset($cartItem->product->productImages[0]->Image) }}"
                                            style="width: 50px; height: 50px" alt="">
                                            @else
                                            <img src="" style="width: 50px; height: 50px" alt="">
                                            @endif

                                           {{ $cartItem->product->Nom }}
                                           @if ($cartItem->productColors)
                                            @if ($cartItem->productColors->color)
                                                <span>-{{ $cartItem->productColors->color->Nom }}</span>

                                            @endif
                                           @endif

                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">{{ $cartItem->product->Prix_vente }} Dh </label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <button type="button"  wire:loading.attr="disabled" wire:click="decrementQuant({{ $cartItem->id }})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                            <input type="text" readonly value="{{$cartItem->Quantité }}" class="input-quantity" />
                                            <button type="button" wire:loading.attr="disabled"  wire:click="incrementQuant({{ $cartItem->id }})" class="btn btn1"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">{{ $cartItem->product->Prix_vente * $cartItem->Quantité}} Dh </label>
                                    @php $totalPrice += $cartItem->product->Prix_vente * $cartItem->Quantité @endphp
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem({{ $cartItem->id  }})" class="btn btn-danger btn-sm">
                                            <span wire:loading.remove  wire:target="removeCartItem({{ $cartItem->id  }})">
                                            <i class="fa fa-trash"></i> Supprimer
                                            </span>
                                            <span wire:loading  wire:target="removeCartItem({{ $cartItem->id  }})">
                                                <i class="fa fa-trash"></i> Suppression
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        <div> Pas De Cartes Disponibles</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-8 my-md-auto mt-3">
                    <br>
                    <h5 style="color:rgb(248, 169, 12);font-weight:bold;text-align:center">
                        Offrez-vous le meilleur avec nos produits de qualité
                        <a href="{{url('/collections')}}" style="font-size: 16px;">Achetez Maintenant</a>
                    </h5>
                </div>
                <div class="col-md-4">
                    <div class="shadow-sm bg-white p-3">
                        <h4 style="color: blue;font-weight:bold">
                            <i class="fa-solid fa-sack-dollar"></i>
                             Total= <span >{{ $totalPrice }} Dh</span>
                        </h4>
                        <hr>
                        <a href="{{ url('/checkout') }}" class="btn w-100" style="background-color:rgb(248, 169, 12);color:white;font-weight:bold ">Paiement</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
