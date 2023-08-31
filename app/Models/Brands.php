<?php

namespace App\Models;

use App\Models\categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brands extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $fillable=[
        'Nom','Slug','Status','Image','Id_Catégorie'
    ];

    public function category()
    {
        return $this->belongsTo(categorie::class,'Id_Catégorie','id');

    }
}
