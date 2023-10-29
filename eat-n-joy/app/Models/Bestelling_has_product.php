<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bestelling_has_product extends Model
{
    use HasFactory;
    protected $table ="bestelling_has_product";
    public $timestamps = false;
    

    public function product(){
        return $this->belongsTo(Products::class,"product_productid",'productid');
    }
}
