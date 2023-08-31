<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\categorie;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;
    public function deleteCategory($category_id)
    {

        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {

        $category=categorie::find($this->category_id);
        $path = 'uploads/category/'.$category->Image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('message','la catégorie est supprimée');
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        $categories=categorie::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories'=>$categories]);
    }
}
