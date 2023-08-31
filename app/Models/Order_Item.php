<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_Item extends Model
{
    use HasFactory;
    protected $table='order__items';

    protected $fillable=['order_Id','product_Id','product_col_Id','Quantité','Prix'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_Id', 'id');

    }
    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'product_Id', 'id');

    // }
}
