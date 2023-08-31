@extends('layouts.app')
@section('title','Offre Du Jour')
@section('content')


<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 style="color:rgb(255, 170, 0);font-weight:bold" class=" text-center"><i class="fa-sharp fa-solid fa-gift"></i> Les meilleures offres sont ici, profitez-en !</h4><br>
                <div class="underlinee mx-auto"></div><br><br>
            </div>


            @forelse ($OffreDuJour as $productItem)
            <div class="col-md-3">
                <div class="product-card">
                        <div class="product-card-img">

                            <label class="stock bg-danger">-50%</label>

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

                    <div class="col-md-12 p-2">
                        <h5>Pas D'offre  Disponibls Oujourd'hui </h5>

                    </div>

                @endforelse

                    <div class="text-center">
                        <a href="{{ url('collections') }}" class="btn btn-primary">Voir Plus</a>
                    </div>



        </div>
    </div>
</div>



@endsection
