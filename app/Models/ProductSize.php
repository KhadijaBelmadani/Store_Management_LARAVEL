<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $table= 'product_sizes';
    protected $fillable =[
        'Id_Produit',
        'Id_Size',
        'Quantité',

    ];
    public function size(){
        return  $this->belongsTo(Size::class,'Id_Color','id');
     }
}
