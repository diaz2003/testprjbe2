<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::paginate(4);
        return view('home', ['products' => $products]);
    }

    public function indexAdmin()
    {
        return view('admin.index');
    }
}
