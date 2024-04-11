<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rate' => 'required|integer',
            'content' => 'required|max:255',
        ], [
            'rate.required' => 'Rate bat buoc nhap',
            'rate.integer' => 'Rate bat buoc la so',
            'content.required' => 'Content bat buoc nhap',
            'content.max' => 'Content toi da 255 ky tu',
        ]);
        $comment = new Comment($validated);
        $comment->user_id = 0;

        $product = Product::find($request->input('product_id'));
        $product->comments()->save($comment);

        return redirect()->route('products.show', $request->input('product_id'))
                         ->with('success', 'Bình luận thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
