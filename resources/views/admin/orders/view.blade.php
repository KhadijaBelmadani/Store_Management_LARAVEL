@extends('layouts.admin')
@section('title','Détails de la Commande')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success mb-3">
                {{ session('message') }}
            </div>
        @endif()
        <div class="card">
            <div class="card-header">
                <h3>
                    Détails de la Commande &nbsp;
                    <a href="{{ url('admin/orders') }}" class="btn btn-sm btn-primary float-end text-white"><i class="fa fa-backward-step" style="font-size: 10px"></i>  Retour</a>
                    <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-sm btn-primary text-white "><i class="fa-solid fa-download"style="font-size: 10px"></i>  Télécharger la Facture</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-sm btn-primary text-white "><i class="fa fa-eye" style="font-size: 10px"></i>  Voir la Facture</a>

                </h3>
            </div>
            <div class="card-body">
                <div class="shadow bg-white p-3">
                    <img src="{{ asset('admin/images/nvlogo.png') }}" style="width: 150px;height:60px;float: right;"/>
                    <h4 class="mb-4" style="color: orange;font-weight:bold"><i class="fa fa-shopping-cart"></i> Détails de la Commande :


                </h4>
                <br>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Détails de la Commande:</h5>

                        <hr>
                        <h6>Id Commande : {{ $order->id }} </h6>
                        <h6>Numéro du colis suivis : {{ $order->traking_mo }}</h6>
                        <h6>Date de Commande : {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
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
                            <th >Id Produit</th>
                            <th >Image</th>
                            <th >Produit </th>
                            <th > Prix</th>
                            <th >Quantité</th>
                            <th >Total </th>
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
        <div class="card border mt-3">
            <div class="card-header">
                <h4>Mise à jour de l'état de la commande:</h4>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label> Modifier l'état de la commande: </label>
                            <br><br>
                            <div class="input-group">
                                 <select name="status" class="form-select">
                                    <option value="" >Sélectionner l'état</option>
                                    <option value="En Cours" {{ Request::get('status') =='En Cours' ? 'selected':''}}>En Cours</option>
                                    <option value="Complet" {{ Request::get('status') =='Complet' ? 'selected':''}}>Complet</option>
                                    <option value="En attente" {{ Request::get('status') =='En attente' ? 'selected':''}}>En attente</option>
                                    <option value="Annulé" {{ Request::get('status') =='Annulé' ? 'selected':''}}>Annulé</option>
                                 </select><br>
                                 <button type="submit" class="btn btn-sm btn-primary text-white fw-bold"><i class="fa-sharp fa-solid fa-pen-to-square" style="font-size: 16px"></i>Modifier</button>

                            </div>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <br>
                        <h4 class="mt-3">L'état actuel de la commande : <span class="text-uppercase">{{ $order->Status_message }}</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

