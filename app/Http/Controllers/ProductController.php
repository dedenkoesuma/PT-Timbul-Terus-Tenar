<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CuttingType;
use App\Models\Series;
use App\Models\HomeSlider;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.product.index',[
            'products'=> Product::all(),
            'title' => 'Product'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('Dashboard.product.create',[
            'title' => 'Add Product',
            'categories' => $categories,
            'brands'=> $brands
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
            'title' => 'required|max:150',
            'category' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'series' => 'required',
            'image' => 'file|mimes:jpeg,png,jpg,gif,mp4|min:2',
            'body' => 'required',
        ]);
    
        // Mengambil title atau name dari kategori berdasarkan ID
        $category = Category::where('id', $validatedData['category'])->value('name');
        $brand = Brand::where('id', $validatedData['brand'])->value('name');
    
        $validatedData['id'] = auth()->user()->id;
        $validatedData['category'] = $category;
        $validatedData['brand'] = $brand;
    
        // Mendapatkan judul produk dan menghasilkan slug dari judul
        $productTitle = $validatedData['title'];
        $productSlug = Str::slug($productTitle);
    
        // Menyimpan gambar ke dalam variabel
        $imageFile = $request->file('image');
    
        // Mendapatkan ekstensi file gambar yang diunggah
        $imageExtension = $imageFile->getClientOriginalExtension();
    
        // Menyusun nama file yang baru dengan menggabungkan slug dan ekstensi
        $newImageFileName = $productTitle . '.' . $imageExtension;
    
        // Simpan gambar dengan nama file yang baru
        $imagePath = $imageFile->storeAs('post-media', $newImageFileName);
        $validatedData['image'] = $imagePath;
        // Simpan produk ke database
        $product = Product::create($validatedData);
    
        return redirect('/dashboard/product')->with('success', 'New Product added!');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Dashboard.product.show',[
            'title' => 'View Product',
            'products'=> $product,
      
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('Dashboard.product.edit',[
            'title' => 'Edit Product',
            'products'=> $product,
            'categories' => $categories,
            'brands'=> $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150',
            'category' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'series' => 'required',
            'image' => 'file|mimes:jpeg,png,jpg,gif,mp4|min:2',
            'body' => 'required',
        ]);

        // Mengambil title atau name dari kategori, brand, type, dan series berdasarkan ID
        $category = Category::where('id', $validatedData['category'])->value('name');
        $brand = Brand::where('id', $validatedData['brand'])->value('name');

        $validatedData['category'] = $category;
        $validatedData['brand'] = $brand;

        // Periksa apakah ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari penyimpanan
            Storage::delete($product->image);
            // Simpan gambar baru dan perbarui path di dalam model
            $imageFile = $request->file('image');
            $imageExtension = $imageFile->getClientOriginalExtension();
            $newImageFileName = Str::slug($validatedData['title']) . '.' . $imageExtension;
            $validatedData['image'] = $imageFile->storeAs('post-media', $newImageFileName);
        }

        // Perbarui data lainnya
        $product->update($validatedData);
        return redirect('/dashboard/product')->with('success', 'Product Updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/dashboard/product')->with('success', 'Product Deleted!');
    }
    public function checkSlug(Request $request)
    {
        $body = strip_tags($request->body); // Menghapus tag HTML dari body
        $body = Str::words($body, 100, ''); // Mengambil maksimal 100 kata dari body
        $slug = SlugService::createSlug(Post::class, 'slug', $body);
        
        return response()->json(['slug' => $slug]);
    }

}