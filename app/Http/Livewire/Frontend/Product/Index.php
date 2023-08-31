<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products ;
    public $category;
    public $brandInputs=[];
    public $priceInputs;

    protected $queryString = [
        'brandInputs'=> ['except' => '', 'as' => 'Marque'],
        'priceInputs'=> ['except' => '', 'as' => 'Prix'],
    ];


    public function mount($category)
    {

        $this->category=$category;
    }

    public function render()
    {
        $this->products= Product::where('Id_Catégorie', $this->category->id)
                                ->when($this->brandInputs, function ($q) {
                                    $q->whereIn('Marque', $this->brandInputs);
                                })
                                ->when($this->priceInputs, function ($q) {

                                    $q->when($this->priceInputs == 'De-Haut-En-Bas', function ($q2) {
                                        $q2->orderBy('Prix_vente', 'DESC');

                                    })
                                    ->when($this->priceInputs == 'De-Bas-En-Haut', function ($q2) {
                                        $q2->orderBy('Prix_vente', 'ASC');
                                    });

                                })
                                ->where('Status', '0')
                                ->get();

        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category,
            ]);
    }
}
