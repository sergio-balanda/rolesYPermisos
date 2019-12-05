<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return 'Tiene permiso de crear';
    }

    public function show(Product $product)
    {
        return 'Tiene permiso de ver';
    }

    public function edit(Product $product)
    {
        return 'Tiene permiso de editar';
    }

    public function destroy(Product $product)
    {
        return 'Tiene permiso de eliminar';
    }
}
