<div>
    <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter les marques</h5>
              <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent="storeBrands">
                <div class="modal-body">
                    <div class="mb-3">
                        <label >Séléctionner la catégorie</label>
                        <select  wire:model.defer="Id_Catégorie" required class="form-control">
                            <option value="">--Séléctionner une catégorie--</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->Nom }}</option>
                            @endforeach
                        </select>
                        @error('Id_Catégorie')
                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Nom" style="font-weight: bold">Nom:</label>
                        <input name="Nom" type="text" wire:model.lazy="Nom" class="form-control" id="Nom" placeholder="Entrez le nom de la marque">
                        @error('Nom')
                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Slug" style="font-weight: bold">Slug:</label>
                        <input name="Slug" type="text" wire:model.lazy="Slug" class="form-control" id="Slug" placeholder="Entrez le slug de la marque">
                        @error('Slug')
                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Status" style="font-weight: bold">Status:</label>
                        <input name="Status" type="checkbox" wire:model.defer="Status" id="Status" > Checked = invisible , Unchecked = visible
                        @error('Status')
                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror
                      </div>


                </div>
                <div class="modal-footer">
                  <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>

          </div>
        </div>
    </div>
</div>
@push('script')
<script>
     window.addEventListener('close-modal',event=>{
        $('#addBrandModal').modal('hide');
    });
</script>

@endpush

<div>
    <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modifier les marques</h5>
              <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div> Chargement
            </div>
            <div wire:loading.remove>
            <form wire:submit.prevent="updateBrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label >Séléctionner la catégorie</label>
                        <select  wire:model.defer="Id_Catégorie" required class="form-control">
                            <option value="">--Séléctionner une catégorie--</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->Nom }}</option>
                            @endforeach
                        </select>
                        @error('Id_Catégorie')
                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Nom" style="font-weight: bold">Nom:</label>
                        <input name="Nom" type="text" wire:model.defer="Nom" class="form-control" id="Nom" placeholder="Entrez le nom de la marque">
                        @error('Nom')
                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Slug" style="font-weight: bold">Slug:</label>
                        <input name="Slug" type="text" wire:model.defer="Slug" class="form-control" id="Slug" placeholder="Entrez le slug de la marque">
                        @error('Slug')
                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="Status" style="font-weight: bold">Status:</label>
                        <input name="Status" type="checkbox" wire:model.defer="Status" id="Status" > Checked = invisible , Unchecked = visible
                        @error('Status')
                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror
                      </div>


                </div>
                <div class="modal-footer">
                  <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
          </div>
        </div>
    </div>
</div>
@push('script')
<script>
     window.addEventListener('close-modal',event=>{
        $('#updateBrandModal').modal('hide');
    });
</script>

@endpush

<div>
    <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Supprimer les marques</h5>
              <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div> Chargement
            </div>
            <div wire:loading.remove>
            <form wire:submit.prevent="destroyBrand">
               <h5>Êtes-vous sûr ?</h5>
                <div class="modal-footer">
                  <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-primary">Oui, Supprimer</button>
                </div>
            </form>
        </div>
          </div>
        </div>
    </div>
</div>
@push('script')
<script>
     window.addEventListener('close-modal',event=>{
        $('#deleteBrandModal').modal('hide');
    });
</script>

@endpush

