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
                    Modifier un Slider
                    <a href="{{ url('admin/sliders/') }}"   class="btn btn-sm btn-secondary float-end" > <i class="fa fa-backward-step" style="font-size: 10px"></i>&nbsp; Retour</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Titre" style="font-weight: bold">Titre:</label>
                        <input name="Titre" type="text" class="form-control" value="{{ $slider->Titre }}" id="Titre" placeholder="Entrez le titre du slider" >
                        @error('Titre')
                            <small class="text-danger">
                               * {{ $message }}
                            </small>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Description" style="font-weight: bold">Déscription:</label>
                        <textarea name="Description" type="text" class="form-control"  id="Description" placeholder="Entrez une déscription au slider" >{{ $slider->Description }}</textarea>
                        @error('Description')
                            <small class="text-danger">
                               * {{ $message }}
                            </small>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Image" style="font-weight: bold">Image:</label>
                        <input name="Image" type="file" class="form-control"  id="Image" >
                        <img src="{{asset("$slider->Image")}}" style="width:50px;height:50px">
                        @error('Image')
                        <small class="text-danger">
                           * {{ $message }}
                        </small>

                    @enderror

                      </div>
                      <div class="form-group">
                        <label for="Status" style="font-weight: bold">Status:</label>
                        <input name="Status" type="checkbox" {{ $slider->Status =='1' ? 'checked':'' }}  id="Status"  > Checked:invisible ,Unchecked:visible
                        @error('Status')
                            <small class="text-danger">
                               * {{ $message }}
                            </small>

                        @enderror

                      </div>
                      <button type="submit" class="btn btn-secondary btn-sm float-end"><i class="fa fa-save" style="font-size: 15px"></i>&nbsp;  Modifier</button>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
