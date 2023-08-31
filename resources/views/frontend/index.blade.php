@extends('layouts.app')
@section('title','Home page')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner">



     @foreach ($sliders as $key=> $sliderItem)
      <div class="carousel-item {{ $key== 0 ? 'active' :''}}">
        @if($sliderItem->Image)
             <img src="{{ asset("$sliderItem->Image") }}" class="d-block w-100" alt="..." style="height:505px">
        @endif


        <div class="carousel-caption d-none d-md-block">
            <div class="custom-carousel-content">
                <h1>
                    {{ $sliderItem->Titre }}
                </h1>
                <p>
                    {{ $sliderItem->Description }}
                </p>
                <div>
                    <a href="#" class="btn btn-slider">
                        Get Now
                    </a>
                </div>
            </div>
        </div>
      </div>

      @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
        <div class="py-5 bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h4 style="color:rgb(255, 170, 0);font-weight:bold">Bienvenue Chez TrendTrove <img src="{{ asset('admin/images/minilogo.png') }}"  style="width: 60px;height:40px"/></h4>
                        <div class="underline text-center"></div>
                            <p>
                                Notre magasin en ligne est votre destination de choix pour tous vos besoins en matière de shopping. Nous proposons une large gamme de produits, allant des vêtements et accessoires pour hommes, femmes et enfants aux produits électroniques, en passant par les produits de beauté, de soins personnels et de bien-être, les articles pour la maison, les jouets pour enfants et bien plus encore. Nous sommes fiers de proposer des produits de haute qualité provenant de marques renommées ainsi que de petits producteurs locaux et artisans.
                            </p>


                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="color:rgb(255, 170, 0);font-weight:bold">Les Produits En Tendance</h4>
                        <div class="underlinee"></div>
                    </div>
                    @if ($trendingProducts )


                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme prodCarousel">
                             @foreach ($trendingProducts as $productItem)
                                <div class="item">


                                <div class="product-card mt-3">
                                <div class="product-card-img">

                                    <label class="stock bg-danger">For You</label>

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

                        @endforeach
                    </div>
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h5>Pas De Produits Disponibls </h5>

                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="text-center">
                <a href="{{ url('collections') }}" class="btn btn-primary">Voir Plus</a>
            </div>
        </div>
        <div class="py-5 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="color:rgb(255, 170, 0);font-weight:bold">Les Nouveautés</h4>
                        <div class="underlineee"></div>
                    </div>
                    @if ($NewArrival )


                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme prodCarousel">
                             @foreach ($NewArrival as $productItem)
                                <div class="item">


                                <div class="product-card mt-3">
                                <div class="product-card-img">

                                    <label class="stock bg-danger">New</label>

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

                        @endforeach
                    </div>
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h5>Pas De nouveautés Disponibls </h5>

                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="text-center">
                <a href="{{ url('nouveautés') }}" class="btn btn-primary">Voir Plus</a>
            </div>
        </div>
        <div class="py-5 bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h4 style="color:rgb(255, 170, 0);font-weight:bold">Offre Du Jour</h4>
                       <div class="underlineeee"></div>
                    </div>
                    @if ($OffreDuJour )


                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme prodCarousel">
                             @foreach ($OffreDuJour as $productItem)
                                <div class="item">


                                <div class="product-card mt-3">
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

                        @endforeach
                    </div>
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h5>Pas D'Offre du jour Disponible </h5>

                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="text-center">
                <a href="{{ url('Offre') }}" class="btn btn-primary">Voir Plus</a>
            </div>
        </div>


@endsection
@section('script')
<script>
    $('.prodCarousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>

@endsection
