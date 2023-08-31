<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Item;
use Livewire\Component;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts ;
    public $totalprodAmount = 0;
    public $fullname ;
    public $phone ;
    public $email ;
    public $codepostal  ;
    public $address;
    public $payment_mode=null;
    public $payment_id=null;
    protected $listeners=['validationForAll','transactionEmit'=>'paidOnlineOrder'];


    public function paidOnlineOrder($value)
    {
        $this->payment_id =$value ;
        $this->payment_mode = "Pyé Par Paypal";
        $codOrder=$this->placeOrder();
        if($codOrder) {
            Cart::where('user_Id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'La Commande est passée avec succès',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }

    }
    public function validationForAll()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'codepostal' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:121',
        ];
    }

    public function placeOrder()
    {
        $this-> validate();
        $order = Order::create([
            'user_Id'=>auth()->user()->id,
            'traking_mo' =>'trend-'.Str::random(10),
            'fullName'=>$this->fullname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'codepostal'=>$this->codepostal,
            'address'=>$this->address,
            'Status_message'=>'En cours',
            'payment_mode'=>$this->payment_mode,
            'payment_id'=>$this->payment_id
        ]);
        foreach($this->carts as $cartItem) {
            $orderItems = Order_Item::create([
                'order_Id'=>$order->id,
                'product_Id'=>$cartItem->Id_Produit,
                'product_col_Id'=>$cartItem->Id_Col_Produit,
                'Quantité'=>$cartItem->Quantité,
                'Prix'=>$cartItem->product->Prix_vente,
            ]);
            if($cartItem->Id_Col_Produit != null) {
                $cartItem->productColor()->where('id', $cartItem->Id_Col_Produit)->decrement('Quantité', $cartItem->Quantité);
            } else {
                $cartItem->product()->where('id', $cartItem->Id_Produit)->decrement('Quantité', $cartItem->Quantité);


            }
        }
        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'Paiement à La Livraison';

        $codOrder=$this->placeOrder();
        if($codOrder) {
            Cart::where('user_Id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'La Commande est passée avec succès',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }

    }

    public function totalprodAmount()
    {
        $this->carts = Cart::where('user_Id', auth()->user()->id)->get();
        foreach($this->carts as $cartItem) {
            $this->totalprodAmount += $cartItem->product->Prix_vente * $cartItem->Quantité ;
        }
        return $this->totalprodAmount ;
    }
    public function render()
    {
        $this->fullname = auth()->user()->name ;
        $this->email = auth()->user()->email ;
        $this->totalprodAmount =$this->totalprodAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalprodAmount'=> $this->totalprodAmount
        ]);
    }
}
