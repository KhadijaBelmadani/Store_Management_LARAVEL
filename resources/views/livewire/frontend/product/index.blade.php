<div>
    <div class="row">
        <div class="col-md-3 mb-4">
            @if($category->brands)
            <div class="card ">
                <div class="card-header">
                    <h4 style="color: #2874f0">Marques</h4>
                </div>
                <div class="card-body ">
                    @foreach($category->brands as $brandItem)
                        <label class="d-block">
                            <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->Nom }}" /> {{ $brandItem->Nom }}
                        </label>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-3" >
            <div class="card ">
                <div class="card-header">
                    <h4 style="color: #2874f0">Prix</h4>
                </div>
                <div class="card-body">
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInputs" value="De-Haut-En-Bas" /> De Haut En Bas
                        </label>
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInputs" value="De-Bas-En-" /> De Bas En Haut
                        </label>
                </div>
            </div>
        </div>

    </div>
<div class="row">


        @forelse ($products as $productItem)
                    <div class="col-md-3 ">
                    <div class="product-card mt-3">
                        <div class="product-card-img">
                            @if ($productItem->Quantité > 0)
                                <label class="stock bg-success">In Stock</label>
                            @else
                                <label class="stock bg-danger">Out Of Stock</label>
                            @endif

                            @if ($productItem->productImages->count() > 0)
                                <a href="{{ url('/collections/'.$productItem->categorie->Slug.'/'.$productItem->Slug ) }}">
                                    <img src="{{ asset($productItem->productImages[0]->Image) }}" alt="{{ $productItem->Nom }}">
                                </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $productItem->Marque }}</p>
                            <h5 class="product-name">
                                <a href="{{ url('/collections/'.$productItem->categorie->Slug.'/'.$productItem->Slug) }}">
                                    {{ $productItem->Nom }}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">{{$productItem->Prix_vente }} Dh</span>
                                <span class="original-price">{{$productItem->Prix_Original }} Dh</span>
                            </div>

                        </div>
                    </div>
                </div>

                    @empty
                        <div class="col-md-12">
                            <div class="p-2">
                                <h5>Pas De Produits Disponibls pour {{ $category->Nom }}</h5>

                            </div>
                        </div>
        @endforelse

    </div>

</div>

