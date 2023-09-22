<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductsController extends Controller
{
    function show(){
        $data = Products::all();
        return view('main',['products'=>$data]);
    }
}
