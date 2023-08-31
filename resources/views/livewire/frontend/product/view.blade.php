<div>
    <div class="py-3 py-md-5 ">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-3 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if($product->productImages)
                        {{-- <img src="{{ asset($product->productImages[0]->Image) }}" class="w-100" alt="Img"> --}}
                        <div class="exzoom" id="exzoom">
                            <div class="exzoom_img_box">
                              <ul class='exzoom_img_ul'>
                                @foreach ($product->productImages as $item)
                                <li><img src="{{ asset($item->Image) }}"/></li>
                                @endforeach

                              </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                          </div>
                        @else
                        <h2>Pas d'images disponibles<h2>
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->Nom }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Acceuil / {{ $product->categorie->Nom }} / {{ $product->Nom }}
                        </p>

                        <div>
                            <span class="selling-price">{{ $product->Prix_vente }}Dh</span>
                            <span class="original-price">{{ $product->Prix_Original }}Dh</span>
                        </div><br>
                        <div>
                            @if ($product->productColors->count() > 0)
                                @if($product->productColors)
                                    @foreach ($product->productColors as $colorItem)
                                        {{-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}"/> {{ $colorItem->color->Nom }} --}}
                                        <label class="colorSelectionLabek" style="background-color:{{ $colorItem->color->Code }} "
                                            wire:click="colorSelected({{ $colorItem->id }})"
                                            >
                                            {{ $colorItem->color->Nom }}
                                        </label>
                                    @endforeach
                                @endif
                                <div>



                                @if ($this->prodcolselquant == 'outOfStock')
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Out Of Stock</label>

                                @elseif ($this->prodcolselquant > 0)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>

                                @endif
                            </div>
                            @else
                                @if ($product->Quantité)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Out Of Stock</label>

                                @endif

                            @endif

                        </div>
                        {{-- <br>
                        <div>
                            @if($product->productSizes)
                            @foreach ($product->productSizes as $sizeItem)
                                <input type="checkbox" name="sizeSelection" value="{{ $sizeItem->id }}"/> {{ $sizeItem->size->Nom ?? ''}}
                            @endforeach
                            @endif
                        </div> --}}
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity" ><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                 <i class="fa fa-shopping-cart"></i>
                                 Ajouter à la carte
                            </button>

                            <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishlist">
                                    <i class="fa fa-heart"></i>
                                        Ajouter à Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishlist">Ajout ...</span>

                            </button>
                        </div>
                        {{-- <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{!! $product->Nom !!}}
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Déscription:</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->Description }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@push('scripts')
<script>
    $(function(){

            $("#exzoom").exzoom({

            // thumbnail nav options
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,

            // autoplay
            "autoPlay": false,

            // autoplay interval in milliseconds
            "autoPlayTimeout": 2000

            });

            });
</script>

@endpush
