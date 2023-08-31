@extends('layouts.app')
@section('title')

{{ $category->Nom }}
@endsection
@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4" style="color: orange;font-weight:bold">Nos Produits:</h4>
                <hr>
            </div>
           <livewire:frontend.product.index  :category="$category"/>
    </div>
</div>
@endsection
