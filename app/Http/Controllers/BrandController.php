<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.brand.index',[
            'brands' => Brand::all(),
            'title' => 'Brand'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.brand.create',[
            'title' => 'Add Brand'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:150"
        ]);

        Brand::create($validatedData);
        return redirect('/dashboard/brand')->with('success', 'Brand add!');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('/dashboard/brand')->with('success', 'Brand Deleted!');
    }
}
