<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h3 style="color:rgb(215, 15, 15);font-weight:bolder"> <i class="fa-regular fa-heart fa-beat"></i> Wishlist:</h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="color: blue;font-weight:bold">Produits</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4 style="color: blue;font-weight:bold">Prix</h4>
                                </div>

                                <div class="col-md-2">
                                    <h4 style="color: blue;font-weight:bold">Supprimer</h4>
                                </div>
                            </div>
                        </div>
                    @forelse ($wishlist as $wishlistItem )
                        @if ($wishlistItem->product)



                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{ url('collections/'.$wishlistItem->product->categorie->Slug.'/'.$wishlistItem->product->Slug) }}">
                                        <label class="product-name">
                                            <img src=" {{ $wishlistItem->product->productImages[0]->Image }}"
                                             style="width: 50px; height: 50px"
                                             alt=" {{ $wishlistItem->product->Nom}}">
                                            {{ $wishlistItem->product->Nom }}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price"> {{ $wishlistItem->product->Prix_vente}} Dh</label>
                                </div>

                                <div class="col-md-4 col-12 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:click="removeWishlistItem({{ $wishlistItem->id }})" class="btn btn-danger btn-sm">
                                           <span wire:loading.remove wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                            <i class="fa fa-trash"></i> Supprimer
                                            </span>
                                            <span wire:loading wire:target="removeWishlistItem({{ $wishlistItem->id }})">
                                                <i class="fa fa-trash"></i> Supression
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                     @empty
                        <h3>Pas de wishlist ajoutée</h3>
                    @endforelse

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
