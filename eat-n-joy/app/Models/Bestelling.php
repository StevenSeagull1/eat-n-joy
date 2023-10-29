<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model
{
    use HasFactory;
    protected $table ="bestelling";
    public $timestamps = false;
   
    
    public function Bestelling_has_products()
    {
        return $this->hasMany(Bestelling_has_product::class,'bestelling_bestellingid', 'bestellingID');
    }
    
}
