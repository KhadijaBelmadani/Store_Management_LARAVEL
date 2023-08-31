<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;

class CartShow extends Component
{
    public $cart,$totalPrice=0;

    public function incrementQuant(int $cartId)
    {
        $cartData= Cart::where('id', $cartId)->where('user_Id', auth()->user()->id)->first();

        if($cartData) {
            if($cartData->productColor()->where('id', $cartData->Id_Col_Produit)->exists()) {
                $prodCol = $cartData->productColor()->where('id', $cartData->Id_Col_Produit)->first();
                if($prodCol->Quantité > $cartData->Quantité) {


                    $cartData->increment('Quantité');
                    $this->dispatchBrowserEvent('message', [
                    'text' => 'La Quantité est Modifiée',
                    'type' => 'success',
                    'status' => 200
                ]);

                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Seulement'.$prodCol->Quantité.'Quantité Disponible',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            } else {
                if($cartData->product->Quantité > $cartData->Quantité) {
                    $cartData->increment('Quantité');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'La Quantité est Modifiée',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Seulement'.$cartData->productl->Quantité.'Quantité Disponible',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }


        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'something went wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function decrementQuant(int $cartId)
    {
        $cartData= Cart::where('id', $cartId)->where('user_Id', auth()->user()->id)->first();


        if($cartData) {
            if($cartData->productColor()->where('id', $cartData->Id_Col_Produit)->exists()) {
                $prodCol = $cartData->productColor()->where('id', $cartData->Id_Col_Produit)->first();
                if($prodCol->Quantité > $cartData->Quantité) {


                    $cartData->decrement('Quantité');
                    $this->dispatchBrowserEvent('message', [
                    'text' => 'La Quantité est Modifiée',
                    'type' => 'success',
                    'status' => 200
                ]);

                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Seulement'.$prodCol->Quantité.'Quantité Disponible',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            } else {
                if($cartData->product->Quantité > $cartData->Quantité) {
                    $cartData->decrement('Quantité');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'La Quantité est Modifiée',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Seulement'.$cartData->productl->Quantité.'Quantité Disponible',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
            }


        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'something went wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function removeCartItem(int $cartId)
    {
        Cart::where('user_Id',auth()->user()->id)->where('id', $cartId)->delete();

            $this->emit('CarteUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Le produit est supprimé de la carte avec succés',
                'type' => 'success',
                'status' => 409
            ]);

    }

    public function render()
    {
        $this->cart= Cart::where('user_Id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
