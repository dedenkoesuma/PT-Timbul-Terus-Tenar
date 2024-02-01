<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.slider.index',[
            'sliders'=> HomeSlider::all(),
            'title' => 'Slider'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.slider.create',[
            'title' => 'Add Slider'
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
            'name' => 'required',
            'product_id' => 'required',
            'media' =>'required|mimes:jpeg,jpg,png,svg,mp4',
        ]); 
 
        $validatedData['id']= auth()->user()->id;
        // Mendapatkan product_id dari atribut data-product-id pada elemen select
        $validatedData['product_id'] = $request->input('product_id');
        // memastikan file hanya disimpan jika memang ada file yang diunggah.
        if ($request->hasFile('media')) {
        $mediaPath = $request->file('media')->store('post-media');
        $validatedData['media'] = $mediaPath;
         }

        HomeSlider::create($validatedData);
    
        return redirect('/dashboard/slider')->with('success', 'New slider added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $homeSlider)
    {
        return view('Dashboard.slider.show',[
            'slider'=> $homeSlider,
            'title' => 'View slider'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function edit($sliderId)
    {
        $homeSlider = HomeSlider::find($sliderId);
        return view('Dashboard.slider.edit', [
            'sliders' => $homeSlider,
            'title' => 'Edit Slider'
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSlider $homeSlider)
    {
        $validatedData = $request->validate([
            "name" => "required|max:150",
            "product_id" => "required",
            "media" => "image|mimes:jpeg,jpg,png,svg"  // Anda bisa menghapus "required" di sini
        ]);
    
        // Jika ada berkas media yang diunggah, unggah dan update atribut media
        if ($request->hasFile('media')) {
            // Unggah berkas media baru
            $imageFile = $request->file('media');
            $imageExtension = $imageFile->getClientOriginalExtension();
            $newImageFileName = $homeSlider->slug . '_' . time() . '.' . $imageExtension;
            $imagePath = $imageFile->storeAs('post-media', $newImageFileName);
    
            // Hapus berkas media lama (jika ada)
            if ($homeSlider->media) {
                Storage::delete($homeSlider->media);
            }
    
            // Update atribut media dengan path berkas media yang baru
            $homeSlider->media = $imagePath;
        }
    
        $homeSlider->update($validatedData);
        return redirect('/dashboard/slider')->with('success', 'Category updated!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSlider $homeSlider)
    {
        $homeSlider->delete();
        return redirect('/dashboard/slider')->with('success', 'Slider Deleted!');
    }
}
