<?php

namespace App\Models;

use App\Models\Order_Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';

    protected $fillable=['user_Id','traking_mo','fullName','email','phone','codepostal','address','Status_message','payment_mode','payment_id'];

    public function orderItems()
    {
        return $this->hasMany(Order_Item::class, 'order_Id', 'id');
    }
}
