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
                    Ajouter une taille
                    <a href="{{ url('admin/sizes') }}"   class="btn btn-sm btn-secondary float-end" > <i class="fa fa-backward-step" style="font-size: 10px"></i>&nbsp; Retour</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/sizes/create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Nom" style="font-weight: bold">Nom:</label>
                       <select name="Nom" id="Nom">
                        <option value="L">L</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="XL">XL</option>
                        <option value="XLL">XLL</option>
                       </select>
                        @error('Nom')
                            <small class="text-danger">
                               * {{ $message }}
                            </small>

                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="Status" style="font-weight: bold">Status:</label>
                        <input name="Status" type="checkbox" id="Status"  > Checked:invisible ,Unchecked:visible
                        @error('Status')
                            <small class="text-danger">
                               * {{ $message }}
                            </small>

                        @enderror

                      </div>
                      <button type="submit" class="btn btn-secondary btn-sm float-end"><i class="fa fa-save"></i>  Envoyer</button>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
