<?php

namespace App\Models;

use App\Models\Brands;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categorie extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
                            'Nom',
                            'Slug',
                            'Description',
                            'Image',
                            'Status'

                            ];

    public function products()
    {
        return $this->hasMany(Product::class, 'Id_Catégorie', 'id');
    }
    public function brands()
    {
        return $this->hasMany(Brands::class, 'Id_Catégorie', 'id')->where('Status','0');
    }
}
