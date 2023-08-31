@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">


          <div class="card card-secondary card-outline">
            <div class="card-body">
              <h5 class="card-title" style="font-weight:bold;"> <i class="fa fa-edit"></i> Modifier une catégorie</h5> <a href="{{ url('admin/category') }}" class="btn btn-secondary btn-sm float-end" ><i class="fa fa-backward-step" style="font-size: 10px"></i> Retour</a> <br>

              <form action="{{ url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="Nom" style="font-weight: bold">Nom:</label>
                    <input name="Nom" type="text" class="form-control" id="Nom" placeholder="Entrez le nom de la catégorie" value="{{ $category->Nom }}">
                    @error('Nom')
                        <small class="text-danger">
                           * {{ $message }}
                        </small>

                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Slug" style="font-weight: bold">Slug:</label>
                    <input name="Slug" type="text" class="form-control" id="Slug" placeholder="Entrez le slug de la catégorie" value="{{ $category->Slug }}">
                    @error('Slug')
                        <small class="text-danger">
                           * {{ $message }}
                        </small>

                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="Image" style="font-weight: bold">Image:</label>
                    <input name="Image" type="file" class="form-control" id="Image" placeholder="Donnez une image à votre catégorie">
                    <img src="{{ asset("$category->Image") }}" width="60px" height="60px" >
                    @error('Image')
                    <small class="text-danger">
                       * {{ $message }}
                    </small>

                @enderror

                  </div>
                  <div class="form-group">
                    <label for="Status" style="font-weight: bold">Status:</label>
                    <input name="Status" type="checkbox" id="Status" value="{{ $category->Status =='1' ? 'checked' :''}}">




                  </div>
                  <div class="form-group">
                    <label for="Description" style="font-weight: bold">Déscription:</label>
                    <input name="Description" type="text" class="form-control" id="Description" placeholder="Donnez une déscription à votre catégorie" value="{{ $category->Description }}">
                  </div>
                    @error('Description')
                    <small class="text-danger">
                       * {{ $message }}
                    </small>

                    @enderror


                  </div>

                  <button type="submit" class="btn btn-secondary btn-sm float-end"><i class="fa fa-save"></i> Modifier</button>
                </div>
              </form>





            </div>
          </div><!-- /.card -->
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
