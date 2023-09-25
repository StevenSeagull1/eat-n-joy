<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function show()
    {
        // Haal alle producten op met hun gerelateerde categorieën
        $products = Products::with('category')->get();

        return view('main', ['products' => $products]);
    }
}

