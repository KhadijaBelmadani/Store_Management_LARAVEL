<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;
    protected $table='wishlists';

    protected $fillable=['user_id','Id_Produit'];

    public function product():BelongsTo
    {
        return  $this->belongsTo(Product::class,'Id_Produit','id');
     }
}
