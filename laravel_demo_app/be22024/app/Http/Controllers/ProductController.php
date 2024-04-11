<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexUser()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }
    public function index()
    {
        $products = Product::all();
        return view('products.admin.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.admin.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ], [
            'name.required' => 'Phai nhap ten san pham',
            'price.required' => 'Phai nhap gia san pham',
            'description.required' => 'Phai nhap mo ta san pham',
            'photo.required' => 'Phai nhap hinh san pham',
        ]);
        // $product = new Product($validated);
        // $product->save();
        Product::create($validated)->categories()->attach($request->categories);

        return redirect()->route('products.index')
                         ->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function showUser(string $id)
    {
        $product = Product::find($id);
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.admin.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ], [
            'name.required' => 'Phai nhap ten san pham',
            'price.required' => 'Phai nhap gia san pham',
            'description.required' => 'Phai nhap mo ta san pham',
            'photo.required' => 'Phai nhap hinh san pham',
        ]);
        $product = Product::find($id);
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];
        $product->photo = $validated['photo'];
        $product->save();
        
        return redirect()->route('products.index')
                         ->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
