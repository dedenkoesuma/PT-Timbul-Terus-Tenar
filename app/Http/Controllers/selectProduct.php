<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class selectProduct extends Controller
{
    public function getProducts(Request $request){
        $query = $request->input('q');
    
        // Mengambil produk yang cocok dengan query 'q'
        $products = Product::where('title', 'LIKE', "%$query%")
        ->select('id', 'title') // Mengambil 'id' dan 'name' dari produk
        ->get();

        // Memformat hasil ke dalam format yang diharapkan oleh Select2A
        $results = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'text' => $product->title
            ];
        });

        return response()->json([
            'results' => $results
    ]);
    }
    
}
