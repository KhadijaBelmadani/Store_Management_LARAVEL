<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category;
    public $product;
    public $prodcolselquant;
    public $prodId;
    public $quantityCount=1;
    public $prodColId ;

    public function addToCart(int $prodId)
    {
        if(Auth::check()) {
            if($this->product->where('id', $prodId)->where('Status', '0')->exists()) {
                if($this->product->productColors()->count() > 1) {
                    if($this->prodcolselquant != null) {
                        if(Cart::where('user_Id',auth()->user()->id)
                                ->where('Id_Produit',$prodId)
                                ->where('Id_Col_Produit',$this->prodColId)
                                ->exists())
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Le Produit est déja ajouté',
                                'type' => 'success',
                                'status' => 404
                            ]);
                        }
                        else{



                                $prodColor = $this->product->productColors()->where('id', $this->prodColId)->first();
                                if($prodColor->Quantité > 0) {
                                    if($prodColor->Quantité > $this->quantityCount) {
                                        Cart::create([
                                            'user_Id'=>auth()->user()->id,
                                            'Id_Produit'=>$prodId,
                                            'Id_Col_Produit'=>$this->prodColId,
                                            'Quantité'=>$this->quantityCount,
                                        ]);
                                        $this->emit('CarteUpdated');
                                        $this->dispatchBrowserEvent('message', [
                                            'text' => 'Le produit est ajouté à la carte avec succés',
                                            'type' => 'success',
                                            'status' => 200
                                        ]);
                                    } else {
                                        $this->dispatchBrowserEvent('message', [
                                            'text' => 'Seulement'.$prodColor->Quantité.'Quantités Disponibles',
                                            'type' => 'warning',
                                            'status' => 404
                                        ]);
                                    }

                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Séléctionner la couleur du produit',
                                        'type' => 'success',
                                        'status' => 404
                                    ]);
                                }
                             }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Séléctionner la couleur du produit',
                            'type' => 'success',
                            'status' => 404
                        ]);
                    }
                } else {

                    if(Cart::where('user_Id',auth()->user()->id)->where('Id_Produit',$prodId)->exists()){
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Le Produit est déja ajouté',
                            'type' => 'warning',
                            'status' => 200
                        ]);
                    }
                    else{


                        if($this->product->Quantité > 0) {
                            if($this->product->Quantité > $this->quantityCount) {
                                Cart::create([
                                    'user_Id'=>auth()->user()->id,
                                    'Id_Produit'=>$prodId,
                                    'Quantité'=>$this->quantityCount,
                                ]);
                                $this->emit('CarteUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Le produit est ajouté à la carte avec succés',
                                    'type' => 'success',
                                    'status' => 200
                                ]);

                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Seulement'.$this->product->Quantité.'Quantités Disponibles',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out Of Stock',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Le Produit N`existe Pas',
                    'type' => 'warning',
                    'status' => 404
                ]);

            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'S`il Vous Plait Inscrivez-Vous Pour Continuer',
                'type' => 'info',
                'status' => 401
            ]);

        }
    }

    public function addToWishlist($prodId)
    {
        if(Auth::check()) {
            if(wishlist::where('user_id', auth()->user()->id)->where('Id_Produit', $prodId)->exists()) {
                // session()->flash('message', 'Déja ajouté à la wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Déja ajouté à la wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'Id_Produit' => $prodId
                ]);
                $this->emit('wishListUpdated');
                // session()->flash('message', 'Le Produit est Ajouté au Wishlist Avec Succés');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Le Produit est Ajouté au Wishlist Avec Succés',
                    'type' => 'success',
                    'status' => 200
                ]);


            }

        } else {
            // session()->flash('message', 'Please Inscrivez-Vous Pour Continuer');
            $this->dispatchBrowserEvent('message', [
                'text' => 'S`il Vous Plait Inscrivez-Vous Pour Continuer',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }

    }

    public function colorSelected($prodColId)
    {
        $this->prodColId = $prodColId;
        $productcolor= $this->product->productColors()->where('id', $prodColId)->first();
        $this->prodcolselquant= $productcolor->Quantité ;
        if($this->prodcolselquant == 0) {
            $this->prodcolselquant = 'outOfStock' ;
        }
    }
    public function decrementQuantity()
    {
        if($this->quantityCount > 1) {
            $this->quantityCount-- ;
        }
    }
    public function incrementQuantity()
    {
        if($this->quantityCount < 10) {
            $this->quantityCount++ ;
        }
    }

    public function mount($category, $product)
    {
        $this->category=$category ;
        $this->product=$product ;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'product' => $this->product,
            'category' => $this->category,

        ]);
    }


}
