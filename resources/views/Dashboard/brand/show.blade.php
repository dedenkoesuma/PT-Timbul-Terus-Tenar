@extends('Dashboard.layouts.main')
@section('page')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambahkan Product </h1>
      </div>
      <a class="btn btn-danger mb-3" href="/dashboard/category">
            <span data-feather="arrow-left" width="15"class="me-3" ></span>
            Kembali
        </a>
        <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="{{asset('storage/' . $category->media)}}"  width="500px"title="" alt="Product">
                        </div>
                        <div class="article-title">
                            <h2>{{$category->name}}</h2>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>  
</main>
@endsection


