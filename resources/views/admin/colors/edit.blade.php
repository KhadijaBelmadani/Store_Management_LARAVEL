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
                    Modifier une couleur
                    <a href="{{ url('admin/colors') }}"   class="btn btn-sm btn-secondary float-end" > <i class="fa fa-backward-step" style="font-size: 10px"></i>&nbsp; Retour</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/colors/'.$color->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Nom" style="font-weight: bold">Nom:</label>
                        <input name="Nom" type="text" class="form-control" id="Nom" value="{{ $color->Nom }}" placeholder="Entrez le nom de la couleur" >
                        @error('Nom')
                            <small class="text-danger">
                               * {{ $message }}
                            </small>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Code" style="font-weight: bold">Code couleur:</label>
                        <input name="Code" type="text" class="form-control" id="Code" value="{{ $color->Code }}" placeholder="Entrez le code de la couleur" >
                        @error('Code')
                            <small class="text-danger">
                               * {{ $message }}
                            </small>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Status" style="font-weight: bold">Status:</label>
                        <input name="Status" type="checkbox" id="Status" value="{{ $color->Status ? 'checked':'' }}" > Checked:invisible ,Unchecked:visible
                        @error('Status')
                            <small class="text-danger">
                               * {{ $message }}
                            </small>

                        @enderror

                      </div>
                      <button type="submit" class="btn btn-secondary btn-sm float-end"><i class="fa fa-save"></i>  Modifier</button>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
