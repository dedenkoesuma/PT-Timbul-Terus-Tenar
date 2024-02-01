<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.category.index',[
            'categories'=> Category::all(),
            'title' => 'Category'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.category.create',[
            'title' => 'Add category'
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
            "name" => "required|max:150",
            "media" => "required|image|mimes:jpeg,jpg,png,svg" 
        ]);
          // Mendapatkan judul produk dan menghasilkan slug dari judul
        $categoryTitle = $validatedData['name'];
        $categorySlug = Str::slug($categoryTitle);

        // Menyimpan berkas ke dalam variabel
        $imageFile = $request->file('media'); // Ubah 'image' menjadi 'media'

        // Mendapatkan ekstensi berkas gambar yang diunggah
        $imageExtension = $imageFile->getClientOriginalExtension();

        // Membuat nama berkas yang baru dengan menggabungkan slug, waktu saat ini, dan ekstensi
        $newImageFileName = $categorySlug . '_' . time() . '.' . $imageExtension;

        // Menyimpan berkas dengan nama yang baru
        $imagePath = $imageFile->storeAs('post-media', $newImageFileName);

        $validatedData['media'] = $imagePath; // Ubah 'image' menjadi 'media'
        
        category::create($validatedData);
        return redirect('/dashboard/category')->with('success', 'category add!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return view('Dashboard.category.show',[
            'category'=> $category,
            'title' => 'View Category'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('Dashboard.category.edit',[
            "category" => $category,
            'title' => 'Edit Category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $validatedData = $request->validate([
            "name" => "required|max:150",
            "media" => "image|mimes:jpeg,jpg,png,svg"  // Anda bisa menghapus "required" di sini
        ]);
    
        // Update atribut nama
        $category->name = $validatedData['name'];
    
        // Jika ada berkas media yang diunggah, unggah dan update atribut media
        if ($request->hasFile('media')) {
            // Unggah berkas media baru
            $imageFile = $request->file('media');
            $imageExtension = $imageFile->getClientOriginalExtension();
            $newImageFileName = $category->slug . '_' . time() . '.' . $imageExtension;
            $imagePath = $imageFile->storeAs('post-media', $newImageFileName);
    
            // Hapus berkas media lama (jika ada)
            if ($category->media) {
                Storage::delete($category->media);
            }
    
            // Update atribut media dengan path berkas media yang baru
            $category->media = $imagePath;
        }
    
        $category->save();
    
        return redirect('/dashboard/category')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect('/dashboard/category')->with('success', 'Category Deleted!');
    }
}
