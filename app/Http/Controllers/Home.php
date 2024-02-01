<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class Home extends Controller
{
    
    public function index() {
        $items = Product::paginate(8);
        $sliders = HomeSlider::with('product')->get();
        $categories = Category::all();
        $params = [
            'title' => 'Home',
            'categories' => $categories,
            'banner' => $sliders,
            'products'=> $items,
        ];
        return view('home', $params);
    }

}
