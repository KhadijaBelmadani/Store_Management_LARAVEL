@extends('layouts.admin')
@section('title','Users list')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Liste des Users
                    <a href="{{ url('admin/users/create') }}"   class="btn btn-sm btn-secondary float-end" > <i class="fa fa-plus"></i> Ajouter Un User</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role_as == '0')
                                <label class="badge btn-primary">User</label>
                                @elseif ($user->role_as == '1')
                                <label class="badge btn-primary">Admin</label>
                                @else
                                <label class="badge btn-primary">Personne</label>

                                @endif
                            </td>

                            <td>
                                <a href="{{ url('admin/users/'.$user->id .'/edit') }}"  class="btn btn-sm btn-success" style="height: 40px">   <i class="fa fa-edit"></i> Modifier</a>
                                <a href="{{ url('admin/users/'.$user->id .'/delete') }}" onclick="return confirm('Êtes-vous sûr ?')" class="btn btn-sm btn-danger"   style="height: 40px">  <i class="fa fa-trash"></i> Supprimer</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Pas de produits trouvés</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
               <div>
                {{ $users->links() }}
               </div>
            </div>
        </div>

    </div>
</div>
@endsection
