@extends('layouts.app')
@section('title','Commandes')
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">


                <h4 class="mb-4" style="color: orange;font-weight:bold"><i class="fa fa-list"></i>  Mes Commandes:</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered  ">
                        <thead>
                            <tr>
                            <th style="color: blue;font-weight:bold">Id Commande</th>
                            <th style="color: blue;font-weight:bold">numéro de suivi de colis</th>
                            <th style="color: blue;font-weight:bold">Nom d'utilisateur</th>
                            <th style="color: blue;font-weight:bold">Mode de Payement </th>
                            <th style="color: blue;font-weight:bold">Date de Commande </th>
                            <th style="color: blue;font-weight:bold">État de Commande</th>
                            <th style="color: blue;font-weight:bold">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order )
                                <tr>
                                    <td>{{ $order->id}}</td>
                                    <td>{{ $order->traking_mo}}</td>
                                    <td>{{ $order->fullName}}</td>
                                    <td>{{ $order->payment_mode}}</td>
                                    <td>{{ $order->created_at->format('d-m-y')}}</td>
                                    <td>{{ $order->Status_message}}</td>
                                    <td>
                                        <a href="{{ url('orders/'.$order->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Pas de commandes disponibles</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>

@endsection

