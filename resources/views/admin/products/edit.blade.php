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
                    Modifier un Produit
                    <a href="{{ url('admin/products') }}"   class="btn btn-sm btn-secondary float-end" >
                        <i class="fa fa-backward-step" style="font-size: 10px"></i> &nbsp; Retour</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/products/'.$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                          Les images de produit
                      </button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane" type="button" role="tab" aria-controls="colors-tab-pane" aria-selected="false" style="font-weight: bold">
                          Les couleurs/tailles du produit
                      </button>
                      </li>
                  </ul><br>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">
                        <div class="mb-3"><br>
                            <label>Catégorie</label><br>
                            <select name="Id_Catégorie" class="form-control" >
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->Id_Catégorie ? 'selected' :'' }}>
                                        {{ $category->Nom }}
                                    </option>
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
                            <input type="text" name="Nom" value="{{ $product->Nom  }}" class="form-control" placeholder="Donner le nom du produit">
                            @error('Nom')
                            <small class="text-danger">
                            * {{ $message }}
                            </small>

                        @enderror
                        </div>
                        <div class="mb-3">
                            <label>Slug</label><br>
                            <input type="text" name="Slug" value="{{ $product->Slug  }}" class="form-control" placeholder="Donner le slug du produit">
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
                                    <option value="{{ $brand->Nom }}" {{ $brand->Nom  == $brand->Marque ? 'selected' :'' }}>
                                        {{ $brand->Nom }}
                                    </option>
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
                            <textarea type="text" name="Description" class="form-control" placeholder="Donner une déscription au produit"> {{ $product->Description  }}</textarea>
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
                                    <input type="text" name="Prix_Original" class="form-control" placeholder="Donner le Prix original du produit"  value="{{ $product->Prix_Original  }}"></input>
                                    @error('Prix_Original')
                            <small class="text-danger">
                            * {{ $message }}
                            </small>

                             @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Prix de vente</label><br>
                                    <input type="text" name="Prix_vente" class="form-control" placeholder="Donner le Prix de vente du produit"  value="{{ $product->Prix_vente  }}"></input>
                                    @error('Prix_vente')
                                    <small class="text-danger">
                                    * {{ $message }}
                                    </small>

                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Quantité</label><br>
                                    <input type="text" name="Quantité" class="form-control" placeholder="Donner la quantité du produit" value="{{ $product->Quantité  }}"></input>
                                    @error('Quantité')
                                    <small class="text-danger">
                                    * {{ $message }}
                                    </small>

                                     @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Tendance</label><br>
                                    <input type="checkbox" name="Tendance" {{ $product->Tendance=='1'? 'checked':'' }}>
                                </div>
                                <div class="mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox" name="Status" {{ $product->Status =='1'? 'checked':'' }}>
                                </div>
                                <div class="mb-3">
                                    <label>Offre du jour</label><br>
                                    <input type="checkbox" name="Offre" {{ $product->Offre =='1'? 'checked':'' }}>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade fade border p-3" id="images-tab-pane" role="tabpanel" aria-labelledby="images-tab">
                        <div class="mb-3">
                            <label style="color: rgb(112, 55, 55);font-weight:bold">Télécharger les images du produit:</label><br><br>
                            <input type="file" name="Image[]" multiple class="form-control">
                            <div>
                                @if($product->productImages)
                                <div class="row">
                                    @foreach ($product->productImages as $img)
                                    <div class="col-md-2">
                                        <img src="{{ asset($img->Image) }}" class="me-4"
                                        style="width: 80px; height:80px" alt="img"/><br><br>
                                        <a href="{{ url('admin/product-image/'.$img->id.'/delete') }}" style="font-weight:bold;display: inline-block;
                                            padding: 0.5em 1em;
                                            background-color:  rgb(112, 55, 55);
                                            color: #fff;
                                            border-radius: 0.25em;
                                            text-decoration: none;
                                            font-size: 11px;
                                            width:80px;
                                            border: 1px solid   rgb(112, 55, 55);" class="btn d-blok ">Supprimer</a>

                                    </div>
                                    @endforeach
                                </div>




                                @else
                                <h5>Pas de images téléchargées</h5>
                                @endif
                            </div>
                            @error('Image')
                            <small class="text-danger">
                            * {{ $message }}
                            </small>

                             @enderror
                        </div>

                    </div>
                    <div class="tab-pane fade fade border p-3" id="colors-tab-pane" role="tabpanel" aria-labelledby="colors-tab">
                        <div class="mb-3">
                            <h4>Ajouter une couleur / taille au produit</h4>
                            <label style="color: rgb(136, 80, 80);font-weight:bold">Séléctionner les couleurs et les tailles du produit:</label><br><br>
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
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                  <tr>
                                    <th>Nom</th>
                                    {{-- <th>Tailles</th> --}}
                                    <th>Quantité</th>
                                    <th>Supprimer</th>
                                  </tr>

                                </thead>
                                <tbody>
                                    @foreach ($product->productColors as $prod_color )
                                         {{-- @foreach ($product->productSizes as $prod_size ) --}}

                                    <tr class="prod-color-tr">
                                        <td style="width: 50px">
                                            @if($prod_color->color)
                                            {{ $prod_color->color->Nom }}
                                            @else
                                            Pas de couleurs trouvées
                                            @endif
                                        </td>
                                        {{-- <td >

                                            @foreach ($product->productSizes as $prod_size )

                                            <input type="checkbox" name="sizes[{{ $prod_size->Id_Size }}]" value="{{ $prod_size->Id_Size }}">
                                             {{ $prod_size->Id_Size }}
                                            @endforeach

                                        </td> --}}
                                        <td>
                                            <div class="input-group mb-3" style="width: 250px">
                                                <input type="text" value="{{ $prod_color->Quantité }}" class="ProdColorQuantite form-control form-control-sm">
                                                <button type="button" value="{{ $prod_color->id}}" class="UpdateProdColorbtn btn btn-primary btn-sm text-white">Modifier </button>
                                                {{-- <button type="button" value="{{ $prod_size->id}}" class="btn btn-primary btn-sm text-white">Modifier la taille</button> --}}

                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="{{ $prod_color->id}}" class="DeleteProdColorbtn btn btn-danger btn-sm text-white">Supprimer </button>
                                            {{-- <button type="button" value="{{ $prod_size->id}}" class="btn btn-danger btn-sm text-white">Supprimer la taille</button> --}}

                                        </td>
                                    </tr>


                                        @endforeach

                                </tbody>

                            </table>
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


@section('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $(document).on('click','.UpdateProdColorbtn',function(){
            var product_id = "{{ $product->id }}";
            var prod_color_id=$(this).val();
            var qty= $(this).closest('.prod-color-tr').find('.ProdColorQuantite').val();
            // alert(prod_color_id);

            if(qty <=0){
                alert('Quantité est obligatoire');
                return false;
            }

            var data={
                'product_id':product_id,
                // 'prod_color_id':prod_color_id,
                'qty':qty
            };
            $.ajax({
                type:"POST",
                url:"/admin/product-color/"+prod_color_id,
                data:data,

                success:function(response){
                    alert(response.message)
                }

            });
        });




        $(document).on('click','.DeleteProdColorbtn',function(){
            var prod_color_id=$(this).val();
            var thisClick=$(this);

            $.ajax({
                type:"GET",
                url:"/admin/product-color/"+prod_color_id+"/delete",


                success:function(response){
                    thisClick.closest('.prod-color-tr').remove();
                    alert(response.message)
                }

            });
        });
    });

</script>
@endsection

