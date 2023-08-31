<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table='carts';

    protected $fillable=['user_Id','Id_Produit','Id_Col_Produit','Quantité'];


    public function product(): BelongsTo
    {
        return  $this->belongsTo(Product::class, 'Id_Produit', 'id');


    }
    public function productColor(): BelongsTo
    {
        return  $this->belongsTo(ProductColor::class, 'Id_Col_Produit', 'id');


    }
}
