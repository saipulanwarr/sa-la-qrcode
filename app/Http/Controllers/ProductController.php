<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    public function test()
    {
        return 'test';
    }

    public function test2()
    {
        return 'test2';
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'kd' => 'required|unique:products',
            'harga' => 'required'
        ]);

        $validateData['stok'] = 1;

        Product::create($validateData);

        return redirect('/products')->with('success', 'New Product has been added!');
    }

    public function show(Product $product)
    {
        $kd = explode('-', $product->kd);
        $bulan = substr($kd[2], 0, 2);
        $tahun = substr($kd[2], 2, 6);
        $message = "$kd[0] area $kd[1] pembelian bulan $bulan tahun $tahun ke $kd[3]";

        return view('products.show', [
            'product' => $product,
            'message' => $message,
        ]);
    }
}
