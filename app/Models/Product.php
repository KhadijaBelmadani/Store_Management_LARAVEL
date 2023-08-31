<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Image;
use App\Models\categorie;
use App\Models\ProductSize;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table= 'products';
    protected $fillable =[
        'Id_Catégorie',
        'Nom',
        'Slug',
        'Marque',
        'Description',
        'Prix_Original',
        'Prix_vente',
        'Quantité',
        'Tendance',
        'Status',
        'Offre'

    ];

    public function categorie()
    {
        return $this->belongsTo(categorie::class, 'Id_Catégorie', 'id');
    }

    public function productImages()
    {
        return $this->hasMany(Image::class, 'Id_Produit', 'id');
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'Id_Produit', 'id');
    }
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class, 'Id_Produit', 'id');
    }
}
