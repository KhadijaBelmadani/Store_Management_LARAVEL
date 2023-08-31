<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brands;
use App\Models\categorie;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationItem = 'bootstrap';
    public $Nom;
    public $Slug;
    public $Status;
    public $Image;
    public $brand_id;
    public $Id_Catégorie;
    public function rules()
    {
        return [
            'Nom' =>['required','string' ],
            'Slug' =>['required','string' ],
            'Status' =>['nullable'],
            'Id_Catégorie'=>['required','integer']

        ];
    }

    public function resetInputs()
    {
        $this->Nom=null;
        $this->Slug=null;
        $this->Status=null;
        $this->brand_id=null;
        $this->Id_Catégorie=null;
    }



    public function storeBrands()
    {
        $validatedData = $this->validate();
        Brands::create([
         'Nom'=>$this->Nom,
         'Slug' => Str::Slug($this->Slug),
        'Status' => $this->Status == true ? '1' : '0',
        'Id_Catégorie'=>$this->Id_Catégorie,
        ]);
        session()->flash('message', 'La marque est ajoutée avec succès');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
    }


    public function editBrand(int $brand_id)
    {
        $this->brand_id=$brand_id;
        $brand=Brands::findOrFail($brand_id);
        $this->Nom= $brand->Nom;
        $this->Slug= $brand->Slug;
        $this->Status= $brand->Status;
        $this->Image= $brand->Image;
        $this->Id_Catégorie= $brand->Id_Catégorie;
    }
    public function closeModal()
    {
        $this->resetInputs();
    }
    public function openModal()
    {
        $this->resetInputs();
    }

    public function updateBrand()
    {

        $validatedData = $this->validate();
        Brands::findOrFail($this->brand_id)->update([
         'Nom'=>$this->Nom,
         'Slug' => Str::Slug($this->Slug),
        'Status' => $this->Status == true ? '1' : '0',
        'Id_Catégorie'=>$this->Id_Catégorie,
        ]);
        session()->flash('message', 'La marque est modifiée avec succès');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id=$brand_id;
    }

    public function destroyBrand()
    {
        Brands::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'La marque est supprimée avec succès');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
    }

    public function render()
    {
        $categories=categorie::where('Status', '0')->get();
        $brands= brands::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brands.index', ['brands'=>$brands,'categories'=>$categories])
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
