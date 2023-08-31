<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Supprimer la catégorie</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <div>
                        <h6>Êtes-vous sûr ?</h6>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-primary">Oui, Supprimer</button>
                </div>
            </form>

          </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>
                    Liste des Catégories
                    <a href="{{ url('admin/category/create') }}" class="btn btn-sm btn-secondary float-end"> <i class="fa fa-plus"></i> Ajouter une catégorie</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->Nom }}</td>
                            <td>{{ $category->Status == '1' ? 'invisible':'visible'  }}</td>
                            <td>
                                <img src="{{ asset("$category->Image") }}" style="width:70px ;height:70px " >

                            </td>
                            <td>
                                <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-sm btn-success" style="height: 40px">   <i class="fa fa-edit"></i> Modifier</a>
                                <a href="#" wire:click="deleteCategory({{ $category->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger" style="height: 40px">  <i class="fa fa-trash"></i> Supprimer</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Pas de catégories trouvées</td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
               <div>
                {{ $categories->links() }}
               </div>
            </div>
        </div>

    </div>
</div>
</div>
@push('script')
<script>
    window.addEventListener('close-modal',event=>{
       $('#deleteModal').modal('hide');
   });
</script>
@endpush
