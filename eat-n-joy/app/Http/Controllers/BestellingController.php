<?php

namespace App\Http\Controllers;

use App\Models\Bestelling;
use App\Models\BestellingRegel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BestellingController extends Controller
{
    public function store(Request $request)
    {
        $bestelling = new Bestelling();
        $bestelling->klantID=Auth::user()->id;
        $bestelling->save();

        foreach (($request->json()->all() ?? []) as $key => $value) {
            $bestellingRegel = new BestellingRegel();
            $bestellingRegel->bestelling_bestellingid=$bestelling->id;
            $bestellingRegel->product_productid=$value['id'];
            $bestellingRegel->save();
        }
    }
}

