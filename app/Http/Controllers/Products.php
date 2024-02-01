<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Mail;
Use App\Mail\DetailProduct;

class Products extends Controller
{
    /**
     * Menampilkan halaman produk dengan filter berdasarkan kategori, brand, type, dan series.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
       // filter
        // Ambil daftar brand, type, dan series, dan kategori unik dari produk
        $brands = Product::distinct('brand')->pluck('brand');
        $brandCounts = [];
        $types = Product::distinct('type')->pluck('type');
        $typeCounts = [];
        $series = Product::distinct('series')->pluck('series');
        $seriesCounts = [];
        $categories = Product::distinct('category')->pluck('category');
        $categoryCounts = [];

        // Hitung jumlah produk untuk setiap kategori
        foreach ($categories as $category) {
            $count = Product::where('category', $category)->count();
            $categoryCounts[$category] = $count;
        }

        // Hitung jumlah produk untuk setiap brand
        foreach ($brands as $brand) {
            $count = Product::where('brand', $brand)->count();
            $brandCounts[$brand] = $count;
        }

        // Hitung jumlah produk untuk setiap type
        foreach ($types as $type) {
            $count = Product::where('type', $type)->count();
            $typeCounts[$type] = $count;
        }

        // Hitung jumlah produk untuk setiap series
        foreach ($series as $ser) {
            $count = Product::where('series', $ser)->count();
            $seriesCounts[$ser] = $count;
        }

        // Tambahkan 'All' ke dalam array sebagai opsi semua brand, type, dan series, dan kategori
        $brandCounts['All'] = Product::count();
        $typeCounts['All'] = Product::count();
        $seriesCounts['All'] = Product::count();
        $categoryCounts['All'] = Product::count();

        // Ambil brand, type, dan series, kategori yang dipilih oleh pengguna (jika ada)
        $brandFilter = $request->input('brand');
        $typeFilter = $request->input('type');
        $seriesFilter = $request->input('series');
        $categoryFilter = $request->input('category');

         // Mulai dengan semua produk
        $filteredProducts = Product::query();

        // Filter produk berdasarkan brand yang dipilih
        if (!empty($brandFilter) && in_array($brandFilter, $brands->toArray())) {
            $filteredProducts = $filteredProducts->where('brand', $brandFilter);
        }

        // Filter produk berdasarkan type yang dipilih
        if (!empty($typeFilter) && in_array($typeFilter, $types->toArray())) {
            $filteredProducts = $filteredProducts->where('type', $typeFilter);
        }

        // Filter produk berdasarkan series yang dipilih
        if (!empty($seriesFilter) && in_array($seriesFilter, $series->toArray())) {
            $filteredProducts = $filteredProducts->where('series', $seriesFilter);
        }

        // Filter produk berdasarkan series yang dipilih
        if (!empty($categoryFilter) && in_array($categoryFilter, $categories->toArray())) {
            $filteredProducts = $filteredProducts->where('category', $categoryFilter);
        }
        

        // Lakukan paginasi pada hasil filter
        $filteredProducts = $filteredProducts->paginate(10);
        $search = $request->search;
        // Cari produk berdasarkan kata kunci pencarian
        $dataSearch = Product::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('category', 'LIKE', '%' . $search . '%')
            ->orWhere('brand', 'LIKE', '%' . $search . '%')
            ->orWhere('type', 'LIKE', '%' . $search . '%')
            ->orWhere('series', 'LIKE', '%' . $search . '%')
            ->paginate(5);
        // Pass daftar produk yang sudah difilter dan perhitungan brand, type, series ke tampilan
        return view('product', [
            'title' => 'Product',
            'search' => $search,
            'brands' => $brands,
            'brandCounts' => $brandCounts,
            'types' => $types,
            'typeCounts' => $typeCounts,
            'series' => $series,
            'seriesCounts' => $seriesCounts,
            'products' => $dataSearch,
            'categories' => $categories,
            'categoryCounts' => $categoryCounts,
        ]);
    }

    /**
     * Menampilkan halaman detail produk berdasarkan kategori, brand, type, dan series.
     *
     * @param Request $request
     * @param string $category
     * @param string $brand
     * @param string $type
     * @param string $series
     * @return \Illuminate\View\View
     */
    public function detail(Request $request, $category, $brand, $type, $series)
    {
        // Cari produk berdasarkan kategori, brand, type, dan series
        $product = Product::where('category', $category)
            ->where('brand', $brand)
            ->where('type', $type)
            ->where('series', $series)
            ->first();

        if (!$product) {
            abort(404); // Tampilkan halaman 404 jika produk tidak ditemukan
        }

        // Mengambil isi dari kolom "body" produk
        $bodyContent = $product->body;

        // Mencocokkan tag <img> dalam konten "body" menggunakan regex
        $pattern = '/<img.*?src=["\'](.*?)["\'].*?>/i';
        preg_match($pattern, $bodyContent, $matches);

        // $matches[1] akan berisi URL gambar jika ada tag <img>, atau NULL jika tidak ada
        $imageUrl = isset($matches[1]) ? $matches[1] : '';


        // Tampilkan halaman detail produk dengan produk yang ditemukan
        return view('Detail.detailProduct', [
            'title' => 'Detail',
            'product' => $product,
            'imageUrl' => $imageUrl,
        ]);
    }

    /**
     * Menampilkan halaman produk dengan filter berdasarkan brand, type, dan series.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function filter(Request $request)
    {
        // filter
        // Ambil daftar brand, type, dan series, dan kategori unik dari produk
        $brands = Product::distinct('brand')->pluck('brand');
        $brandCounts = [];
        $types = Product::distinct('type')->pluck('type');
        $typeCounts = [];
        $series = Product::distinct('series')->pluck('series');
        $seriesCounts = [];
        $categories = Product::distinct('category')->pluck('category');
        $categoryCounts = [];

        // Hitung jumlah produk untuk setiap kategori
        foreach ($categories as $category) {
            $count = Product::where('category', $category)->count();
            $categoryCounts[$category] = $count;
        }

        // Hitung jumlah produk untuk setiap brand
        foreach ($brands as $brand) {
            $count = Product::where('brand', $brand)->count();
            $brandCounts[$brand] = $count;
        }

        // Hitung jumlah produk untuk setiap type
        foreach ($types as $type) {
            $count = Product::where('type', $type)->count();
            $typeCounts[$type] = $count;
        }

        // Hitung jumlah produk untuk setiap series
        foreach ($series as $ser) {
            $count = Product::where('series', $ser)->count();
            $seriesCounts[$ser] = $count;
        }

        // Tambahkan 'All' ke dalam array sebagai opsi semua brand, type, dan series, dan kategori
        $brandCounts['All'] = Product::count();
        $typeCounts['All'] = Product::count();
        $seriesCounts['All'] = Product::count();
        $categoryCounts['All'] = Product::count();

        // Ambil brand, type, dan series, kategori yang dipilih oleh pengguna (jika ada)
        $brandFilter = $request->input('brand');
        $typeFilter = $request->input('type');
        $seriesFilter = $request->input('series');
        $categoryFilter = $request->input('category');

         // Mulai dengan semua produk
        $filteredProducts = Product::query();

        // Filter produk berdasarkan brand yang dipilih
        if (!empty($brandFilter) && in_array($brandFilter, $brands->toArray())) {
            $filteredProducts = $filteredProducts->where('brand', $brandFilter);
        }

        // Filter produk berdasarkan type yang dipilih
        if (!empty($typeFilter) && in_array($typeFilter, $types->toArray())) {
            $filteredProducts = $filteredProducts->where('type', $typeFilter);
        }

        // Filter produk berdasarkan series yang dipilih
        if (!empty($seriesFilter) && in_array($seriesFilter, $series->toArray())) {
            $filteredProducts = $filteredProducts->where('series', $seriesFilter);
        }

        // Filter produk berdasarkan series yang dipilih
        if (!empty($categoryFilter) && in_array($categoryFilter, $categories->toArray())) {
            $filteredProducts = $filteredProducts->where('category', $categoryFilter);
        }
        

        // Lakukan paginasi pada hasil filter
        $filteredProducts = $filteredProducts->paginate(10);
        $search = $request->search;
        // Cari produk berdasarkan kata kunci pencarian
        $dataSearch = Product::where('title', 'LIKE', '%' . $search . '%')
            ->orWhere('category', 'LIKE', '%' . $search . '%')
            ->orWhere('brand', 'LIKE', '%' . $search . '%')
            ->orWhere('type', 'LIKE', '%' . $search . '%')
            ->orWhere('series', 'LIKE', '%' . $search . '%')
            ->paginate(5);
        // Pass daftar produk yang sudah difilter dan perhitungan brand, type, series ke tampilan
        return view('product', [
            'title' => 'Product',
            'search' => $search,
            'brands' => $brands,
            'brandCounts' => $brandCounts,
            'types' => $types,
            'typeCounts' => $typeCounts,
            'series' => $series,
            'seriesCounts' => $seriesCounts,
            'products' => $filteredProducts,
            'categories' => $categories,
            'categoryCounts' => $categoryCounts,
        ]);
    }
}