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
                    Liste des tailles
                    <a href="{{ url('admin/sizes/create') }}"   class="btn btn-sm btn-secondary float-end" > <i class="fa fa-plus"></i> Ajouter une taille</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sizes as $size)


                        <tr>
                            <td>{{ $size->id }}</td>
                             <td>{{ $size->Nom }}</td>



                            <td>{{ $size->Status == '1' ? 'invisible':'visible'  }}</td>

                            <td>
                                <a href="{{ url('admin/sizes/'.$size->id .'/edit') }}"  class="btn btn-sm btn-success" style="height: 40px">   <i class="fa fa-edit"></i> Modifier</a>
                                <a href="{{ url('admin/sizes/'.$size->id .'/delete') }}" onclick="return confirm('Êtes-vous sûr ?')" class="btn btn-sm btn-danger"   style="height: 40px">  <i class="fa fa-trash"></i> Supprimer</a>
                            </td>
                        </tr>
                        @endforeach
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
