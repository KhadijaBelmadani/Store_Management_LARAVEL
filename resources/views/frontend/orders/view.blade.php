@extends('layouts.app')
@section('title','Détails de commande')
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4" style="color: orange;font-weight:bold"><i class="fa fa-shopping-cart"></i> Détails de la Commande :
                    <a href="{{ url('orders') }}" class="btn btn-sm btn-primary float-end"><i class="fa fa-backward-step" style="font-size: 10px"></i>  Retour</a>
                </h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Détails de la Commande:</h5>
                        <hr>
                        <h6>Id Commande : {{ $order->id }} </h6>
                        <h6>Numéro du colis suivis : {{ $order->traking_mo }}</h6>
                        <h6>Date de Commande : {{ $order->created_at->format('d-m-y h:i A') }}</h6>
                        <h6>Mode de Payement : {{ $order->payment_mode }}</h6>
                        <br>
                        <h6 class="border p-2 text-uppercase">
                            L'état de la Commande : <span class="text-uppercase">{{ $order->Status_message }}</span>
                        </h6>
                    </div>

                        <div class="col-md-6">
                            <h5>Détails d'utilisateur:</h5>
                            <hr>
                            <h6>Le nom Complet : {{ $order->fullName }}</h6>
                            <h6>Email : {{ $order->email }}</h6>
                            <h6> Phone : {{ $order->phone }}</h6>
                            <h6>Adresse : {{ $order->address }}</h6>
                            <h6>Le code postal : {{ $order->codepostal }}</h6>
                        </div>

                </div> <br>
                <h5>Les produits de La Commande: </h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                            <th style="color: blue;font-weight:bold">Id Produit</th>
                            <th style="color: blue;font-weight:bold">Image</th>
                            <th style="color: blue;font-weight:bold">Produit </th>
                            <th style="color: blue;font-weight:bold"> Prix</th>
                            <th style="color: blue;font-weight:bold">Quantité</th>
                            <th style="color: blue;font-weight:bold">Total </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPrice = 0;
                            @endphp

                            @foreach ($order->orderItems as $orderItem )
                                <tr>
                                    <td>{{ $orderItem->id}}</td>
                                    <td>
                                        @if ($orderItem->product->productImages)
                                        <img src="{{ asset($orderItem->product->productImages[0]->Image) }}"
                                        style="width: 50px; height: 50px" alt="">
                                        @else
                                        <img src="" style="width: 50px; height: 50px" alt="">
                                        @endif

                                    </td>
                                    <td>{{ $orderItem->product->Nom }}</td>
                                    <td>{{ $orderItem->Prix}} Dh</td>
                                    <td>{{ $orderItem->Quantité}}</td>
                                    <td class="fw-bold">{{ $orderItem->Quantité * $orderItem->Prix}} Dh</td>
                                    @php
                                        $totalPrice += $orderItem->Quantité * $orderItem->Prix;
                                    @endphp

                                </tr>

                            @endforeach
                            <tr>
                                <td colspan="5" style="color: blue;font-weight:bold" class="text-center">Le Prix Total:</td>
                                <td colspan="1" class="fw-bold">{{ $totalPrice }} Dh</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

