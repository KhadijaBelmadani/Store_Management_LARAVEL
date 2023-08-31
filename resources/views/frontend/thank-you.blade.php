@extends('layouts.app')
@section('title','Merci')
@section('content')
<div class="py-3 pyt-md-4">
    <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <img src="{{ asset('admin/images/minilogo.png') }}"  style="width: 60px;height:45px"/>
            <h2 style="color:rgb(248, 169, 12);font-weight:bold;">Merci pour votre achat !</h2>
            <p>Nous vous remercions d'avoir acheté notre produit. Votre commande a été passée avec succès et sera bientôt expédiée.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Retour à la page d'accueil</a>
          </div>
        </div>
    </div>
</div>




  @endsection
