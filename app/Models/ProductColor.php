<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table= 'product_colors';
    protected $fillable =[
        'Id_Produit',
        'Id_Color',
        'Quantité',

    ];
    public function color(){
        return  $this->belongsTo(Color::class,'Id_Color','id');    }
}
