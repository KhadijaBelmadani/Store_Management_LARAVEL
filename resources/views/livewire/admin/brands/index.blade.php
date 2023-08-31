<div>
@include('livewire.admin.brands.modal-form')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Liste des Marques
                    <a href="#"  data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-sm btn-secondary float-end" > <i class="fa fa-plus"style="font-size: 10px"></i> Ajouter une marque</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Slug</th>
                            <th>Status</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->Nom }}</td>

                            <td>
                                @if($brand->category)
                                {{ $brand->category->Nom }}
                                @else
                                Pas de catégorie
                                @endif
                            </td>
                            <td>{{ $brand->Slug }}</td>
                            <td>{{ $brand->Status == '1' ? 'invisible':'visible'  }}</td>

                            <td>
                                <a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success" style="height: 40px">   <i class="fa fa-edit"></i> Modifier</a>
                                <a href="#" class="btn btn-sm btn-danger"  wire:click="deleteBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" style="height: 40px">  <i class="fa fa-trash"></i> Supprimer</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Pas de marques trouvées</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
               <div>
                {{ $brands->links() }}
               </div>
            </div>
        </div>

    </div>
</div>
</div>
@push('script')
<script>
     window.addEventListener('close-modal',event=>{
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    });
</script>

@endpush
