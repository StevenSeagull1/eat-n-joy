<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    // Definieer de relatie met de categorieën
    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_categorieid');
    }
}

