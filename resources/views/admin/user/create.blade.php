@extends('layouts.admin')
@section('title','Ajouter user')
@section('content')

<div class="row">
    <div class="col-md-6">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Ajouter un User
                    <a href="{{ url('admin/users') }}"   class="btn btn-sm btn-secondary float-end" > <i class="fa fa-backward-step" style="font-size: 10px"></i>  Retour</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/users') }}" method="POST">
                    @csrf
                    <div class="col-md-6 mb-3">
                        <label  style="font-weight: bold">Nom:</label>
                        <input name="name" type="text" class="form-control"  placeholder="Entrez le nom de user">
                        @error('name')
                                <small class="text-danger">
                                * {{ $message }}
                                </small>

                        @enderror

                    </div>
                    <div class="col-md-6 mb-3">
                        <label  style="font-weight: bold">Email:</label>
                        <input name="email" type="text" class="form-control"  placeholder="Entrez l'email de user">
                        @error('email')
                                <small class="text-danger">
                                * {{ $message }}
                                </small>

                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label  style="font-weight: bold">Password:</label>
                        <input name="password" type="text" class="form-control"  placeholder="Entrez le password de user">
                        @error('password')
                                <small class="text-danger">
                                * {{ $message }}
                                </small>

                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label  style="font-weight: bold">Sélectionner le role:</label>
                        <select name="role_as" class="form-control">
                            <option value="">Sélectionner le role</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                        @error('role_as')
                        <small class="text-danger">
                        * {{ $message }}
                        </small>

                @enderror
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-sm btn-secondary "><i class="fa fa-save"></i> Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
