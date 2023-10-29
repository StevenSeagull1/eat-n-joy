<?php

namespace App\Http\Controllers;

use App\Models\Bestelling;
use App\Models\Bestelling_has_product;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BestellingController extends Controller
{
    public function show()
    {
        
        // Haal alle producten op met hun gerelateerde categorieën
        $user = Auth::user();
        $data = $user->bestellingen;  

        return view('bestelling', ['bestelling' => $data]);

    }
    
    public function store(Request $request)
    {
        $bestelling = new Bestelling();
        $bestelling->klantID=Auth::user()->id;
        $bestelling->save();

        foreach (($request->json()->all() ?? []) as $key => $value) {
            $Bestelling_has_product = new Bestelling_has_product();
            $Bestelling_has_product->bestelling_bestellingid=$bestelling->id;
            $Bestelling_has_product->product_productid=$value['id'];
            $Bestelling_has_product->save();
        }
    }
}