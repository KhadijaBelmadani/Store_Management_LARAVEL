@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Liste des Produits
                    <a href="{{ url('admin/products/create') }}"   class="btn btn-sm btn-secondary float-end" > <i class="fa fa-plus"></i> Ajouter un produit</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Catégorie</th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if($product->categorie)
                                {{ $product->categorie->Nom }}
                                @else
                                    pas de categorie
                                @endif
                            </td>
                            <td>{{ $product->Nom }}</td>
                            <td>{{ $product->Prix_vente }}</td>
                            <td>{{ $product->Quantité }}</td>
                            <td>{{ $product->Status == '1' ? 'invisible':'visible'  }}</td>

                            <td>
                                <a href="{{ url('admin/products/'.$product->id .'/edit') }}"  class="btn btn-sm btn-success" style="height: 40px">   <i class="fa fa-edit"></i> Modifier</a>
                                <a href="{{ url('admin/products/'.$product->id .'/delete') }}" onclick="return confirm('Êtes-vous sûr ?')" class="btn btn-sm btn-danger"   style="height: 40px">  <i class="fa fa-trash"></i> Supprimer</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Pas de produits trouvés</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
               <div>
                {{-- {{ $brands->links() }} --}}
               </div>
            </div>
        </div>

    </div>
</div>
@endsection
