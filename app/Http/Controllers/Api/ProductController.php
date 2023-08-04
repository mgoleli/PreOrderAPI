<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'data' => $products,
        ]);
    }

    public function store(Request $request){
        $product = new Product();
        $product->productName = $request->input('urunAd');
        $product->productPrice = $request->input('urunFiyat');
        $product->productQuantity = $request->input('urunMiktar');
        $product->save();

        return response()->json([
            'success' => "Ürün ekleme Başarılı"
        ]);
    }
}
