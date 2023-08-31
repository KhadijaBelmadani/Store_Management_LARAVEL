@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        {{-- @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif --}}
        <div class="card card-secondary">
            <div class="card-header">
                <h3>
                    Ajouter un Produit
                    <a href="{{ url('admin/products') }}"   class="btn btn-sm btn-secondary float-end" >
                        <i class="fa fa-backward-step" style="font-size: 10px"></i>&nbsp;  Retour</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/products') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"  style="font-weight: bold">
                        Acceuil
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false" style="font-weight: bold">
                        Détailes
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images-tab-pane" type="button" role="tab" aria-controls="images-tab-pane" aria-selected="false" style="font-weight: bold">
                          Les images du produit
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane" type="button" role="tab" aria-controls="colors-tab-pane" aria-selected="false" style="font-weight: bold">
                          Les couleurs / tailles du produit
                      </button>
                    </li>

                  </ul><br>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                        <div class="mb-3"><br>
                            <label>Catégorie</label><br>
                            <select name="Id_Catégorie" class="form-control" >
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->Nom }}</option>
                                @endforeach

                            </select>
                            @error('Id_Catégorie')
                                <small class="text-danger">
                                * {{ $message }}
                                </small>

                            @enderror

                        </div>
                        <div class="mb-3">
                            <label>Nom</label><br>
                            <input type="text" name="Nom" class="form-control" placeholder="Donner le nom du produit">
                            @error('Nom')
                            <small class="text-danger">
                            * {{ $message }}
                            </small>

                        @enderror
                        </div>
                        <div class="mb-3">
                            <label>Slug</label><br>
                            <input type="text" name="Slug" class="form-control" placeholder="Donner le slug du produit">
                            @error('Slug')
                            <small class="text-danger">
                            * {{ $message }}
                            </small>

                        @enderror
                        </div>
                        <div class="mb-3"><br>
                            <label>Marque</label><br>
                            <select name="Marque" class="form-control">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->Nom }}">{{ $brand->Nom }}</option>
                                @endforeach

                            </select>
                            @error('Marque')
                            <small class="text-danger">
                            * {{ $message }}
                            </small>

                        @enderror

                        </div>
                        <div class="mb-3">
                            <label>Déscription</label><br>
                            <textarea type="text" name="Description" class="form-control" placeholder="Donner une déscription au produit"></textarea>
                            @error('Description')
                            <small class="text-danger">
                            * {{ $message }}
                            </small>

                             @enderror

                        </div>
                    </div>
                    <div class="tab-pane fade border p-3  " id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>Prix original</label><br>
                                    <input type="text" name="Prix_Original" class="form-control" placeholder="Donner le Prix original du produit"></input>
                                    @error('Prix_Original')
                            <small class="text-danger">
                            * {{ $message }}
                            </small>

                             @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Prix de vente</label><br>
                                    <input type="text" name="Prix_vente" class="form-control" placeholder="Donner le Prix de vente du produit"></input>
                                    @error('Prix_vente')
                                    <small class="text-danger">
                                    * {{ $message }}
                                    </small>

                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Quantité</label><br>
                                    <input type="text" name="Quantité" class="form-control" placeholder="Donner la quantité du produit"></input>
                                    @error('Quantité')
                                    <small class="text-danger">
                                    * {{ $message }}
                                    </small>

                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Tendance</label><br>
                                    <input type="checkbox" name="Tendance">
                                </div>
                                <div class="mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="Status" >
                                </div>
                                <div class="mb-3">
                                    <label>Offre du jour</label><br>
                                    <input type="checkbox" name="Offre" >
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade fade border p-3" id="images-tab-pane" role="tabpanel" aria-labelledby="images-tab">
                        <div class="mb-3">
                            <label style="color: rgb(136, 80, 80);font-weight:bold">Télécharger les images du produit:</label><br><br>
                            <input type="file" name="Image[]" multiple class="form-control">

                            @error('Image')
                            <small class="text-danger">
                            * {{ $message }}
                            </small>

                             @enderror
                        </div>

                    </div>
                    <div class="tab-pane fade fade border p-3" id="colors-tab-pane" role="tabpanel" aria-labelledby="colors-tab">
                        <div class="mb-3">
                            <label style="color: rgb(136, 80, 80);font-weight:bold">Séléctionner les couleurs du produit:</label><br><br>
                            <div class="row">
                                @forelse  ($colors as $color)
                                <div class="col-md-3">
                                    <div class="p-2 border">
                                        <label for="" style="font-weight: bold">Couleur:</label>
                                   <input type="checkbox" name="colors[{{ $color->id }}]" value="{{ $color->id }}">
                                    {{ $color->Nom }}
                                    <br><br>
                                    <label for="" style="font-weight: bold">tailles:</label><br>
                                    @foreach ($sizes as $size )

                                    <input type="checkbox" name="sizes[{{ $size->id }}]" value="{{ $size->id }}">
                                     {{ $size->Nom }}
                                    @endforeach

                                    <br><br>
                                    <label for="" style="font-weight: bold"> Quantité: </label>
                                  <input type="number" name="CouleurQuantité[{{ $color->id }}]" style="width:70px;border:1px solid" >
                                    </div>

                                </div>
                                @empty
                                <div class="col-md-12">
                                    <h5>Pas de couleurs trouvées</h5>
                                </div>

                                @endforelse



                            </div>



                        </div>

                    </div>

                  <div>
                        <button type="submit" class="btn btn-sm btn-secondary float-end"><i class="fa fa-save"></i> Envoyer</button>

               </div>
            </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
