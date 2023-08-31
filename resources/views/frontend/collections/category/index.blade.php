@extends('layouts.app')
@section('title','Catégories')
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4" style="color: orange;font-weight:bold">Nos Catégories:</h4>
                <hr>
            </div>
            @forelse ($categories as $categoryItem )
             <div class="col-6 col-md-3 mb-4">
                <div class="category-card ">
                    <a href="{{ url('/collections/'.$categoryItem->Slug) }}">
                        <div class="category-card-img ">
                            <img src="{{ asset($categoryItem->Image) }}" class="w-100">
                        </div>
                        <div class="category-card-body">
                            <h5>{{ $categoryItem->Nom }}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @empty
                <div class="col-md-12">
                    <h5>Pas De Catégories Disponibles</h5>
                </div>
            @endforelse

        </div>
    </div>
</div>

@endsection

