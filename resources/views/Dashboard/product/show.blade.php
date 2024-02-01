@extends('Dashboard.layouts.main')
@section('page')
<?php

// Mengambil konten body dari produk
$bodyContent = $products->body;

// Membuat DOMDocument untuk mengurai HTML
$doc = new DOMDocument();

// Mengabaikan kesalahan yang terkait dengan parsing HTML
libxml_use_internal_errors(true);

// Memuat HTML dengan metode loadHTML()
$doc->loadHTML(mb_convert_encoding($bodyContent, 'HTML-ENTITIES', 'UTF-8'));

// Menghentikan penanganan kesalahan
libxml_use_internal_errors(false);

// Mengonversi DOMDocument kembali ke string HTML
$bodyWithStyles = $doc->saveHTML();
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambahkan Product </h1>
      </div>
      <a class="btn btn-danger mb-3" href="/dashboard/product">
            <span data-feather="arrow-left" width="15"class="me-3" ></span>
            Kembali
        </a>
        <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
            @if(pathinfo($products->image, PATHINFO_EXTENSION) === 'mp4')
                <video controls controlsList="nodownload" class="img-responsive col-md-6 col-xs-12">
                    <source src="{{ asset('storage/' . $products->image) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                        <img id="zoom_01" class="shop-item-detail-photo-active img-responsive" alt="photo item active" src="{{ asset('storage/' . $products->image) }}" width="500px" data-zoom-image="{{ asset('storage/' . $products->image) }}"/>
            @endif
                        </div>
                        <div class="article-title">
                            <h2>{{$products->title}}</h2>
                            </div>
                        </div>
                        <div class="article-content">
                            @if (!empty($imageUrl))
                    {!! $bodyWithStyles !!}
                    <br>
                @elseif(empty($imageUrl))
                <?php
                echo $products->body;
                ?>
                
                @endif
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>  
</main>
@endsection


