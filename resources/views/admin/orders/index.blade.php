@extends('layouts.admin')
@section('title','Commandes')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Liste des Commandes
                    {{-- <a href="{{ url('admin/products/create') }}"   class="btn btn-sm btn-secondary float-end" > <i class="fa fa-plus"></i> Ajouter un produit</a> --}}
                </h3>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                    <div class="col-md-6">
                        <label for="" class="fw-bold">Filtrer Par Date:</label>
                        <br> <br>
                        <input name="date" type="date" value="{{Request::get('date') ?? date('y-m-d') }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="fw-bold">Filtrer Par état de Commande:</label>
                        <br><br>
                        <select name="status" class="form-select" >
                            <option value="" >Sélectionner l'état</option>
                            <option value="En Cours" {{ Request::get('status') =='En Cours' ? 'selected':''}}>En Cours</option>
                            <option value="Complet" {{ Request::get('status') =='Complet' ? 'selected':''}}>Complet</option>
                            <option value="En attente" {{ Request::get('status') =='En attente' ? 'selected':''}}>En attente</option>
                            <option value="Annulé" {{ Request::get('status') =='Annulé' ? 'selected':''}}>Annulé</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <button type="submit" class="btn btn-sm btn-primary text-white fw-bold ">Filtrer</button>


                    </div>
                </div>
                </form>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                            <th >Id Commande</th>
                            <th >numéro de suivi de colis</th>
                            <th >Nom d'utilisateur</th>
                            <th >Mode de Payement </th>
                            <th >Date de Commande </th>
                            <th >État de Commande</th>
                            <th >Action </th>
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
                                        <a href="{{ url('admin/orders/'.$order->id) }}" class="btn btn-primary btn-sm text-white fw-bold">Voir</a>
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


@endsection

