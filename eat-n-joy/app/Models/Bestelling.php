<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model
{
    use HasFactory;
    protected $table ="bestelling";
    public $timestamps = false;
    public function klant()
    {
        return $this->belongsTo(User::class, 'klantID');
    }
    


}
