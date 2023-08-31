@extends('layouts.app')
@section('title')

{{ $product->Nom }}
@endsection
@section('content')

<div>
    <livewire:frontend.product.view :category="$category" :product="$product"  />
</div>

@endsection
