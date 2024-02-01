@extends('layouts.app')

@section('page')
  <!--======= SUB BANNER =========-->
  <section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li class="active"><a href="{{url('/product')}}">{{$title}}</a></li>
        </ol>
      </div>
    </div>
  </section>

  <!-- Products -->
  <section class="shop-page padding-top-100 padding-bottom-100">
    <div class="container">
      <div class="row">
        <!-- Shop SideBar -->
        <div class="col-sm-3">
          <div class="shop-sidebar">
            <!-- Category -->
            <h5 class="shop-tittle margin-bottom-30">Category</h5>
            <ul class="shop-cate">
              <!-- All category item -->
              <li><a href="{{ route('products.filter', ['category' => 'All']) }}">All <span>{{ $categoryCounts['All'] }}</span></a></li>
              <!-- Loop through categories -->
              @foreach ($categories as $category)
                <li><a href="{{ route('products.filter', ['category' => $category]) }}">{{ $category }} <span>{{ $categoryCounts[$category] }}</span></a></li>
              @endforeach
            </ul>
              <h5 class="shop-tittle margin-bottom-30">Brand</h5>
                <ul class="shop-cate">
                    <!-- Semua item brand -->
                    <li><a href="{{ route('products.filter', ['brand' => 'All']) }}">All <span>{{ $brandCounts['All'] }}</span></a></li>
                    <!-- Loop melalui brand -->
                    @foreach ($brands as $brand)
                        <li><a href="{{ route('products.filter', ['brand' => $brand]) }}">{{ $brand }} <span>{{ $brandCounts[$brand] }}</span></a></li>
                    @endforeach
                </ul>

    <h5 class="shop-tittle margin-bottom-30">Type</h5>
    <ul class="shop-cate">
        <!-- Semua item type -->
        <li><a href="{{ route('products.filter', ['type' => 'All']) }}">All <span>{{ $typeCounts['All'] }}</span></a></li>
        <!-- Loop melalui type -->
        @foreach ($types as $type)
            <li><a href="{{ route('products.filter', ['type' => $type]) }}">{{ $type }} <span>{{ $typeCounts[$type] }}</span></a></li>
        @endforeach
    </ul>

<!--<h5 class="shop-tittle margin-bottom-30">Series</h5>
<ul class="shop-cate">
    <! Semua item series -->
    <!-- <li><a href="{{ route('products.filter', ['series' => 'All']) }}">All <span>{{ $seriesCounts['All'] }}</span></a></li> -->
    <!-- Loop melalui series -->
    <!-- @foreach ($series as $ser)
        <li><a href="{{ route('products.filter', ['series' => $ser]) }}">{{ $ser }} <span>{{ $seriesCounts[$ser] }}</span></a></li>
    @endforeach
</ul> -->

          </div>
        </div>
        
        

        <!-- Item Content -->
        <div class="col-sm-9">
          <div class="item-display">
            <div class="row">
              <div class="col-xs-12">
                <span class="product-num">
                  Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} products sorted 
                </span>
              </div>

              <div class="col-xs-12 margin-bottom-20">
                <div class="pull-right">
                  <!-- Search -->
                  <form action="{{ url('product') }}"  method="get">
                    <input type="text" name="search" class="input-rounded" value={{$search}}>
                    <button type="submit" class="btn-small" style="line-height:20px;background: none; border-radius: 5px;border: 1px solid black;color: black;">Search</button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Product Items -->
            <div class="papular-block row single-img-demos item-row">
              @foreach($products as $product)
                <!-- Item -->
                <div class="col-md-4">
                  <div class="item">
                  @if(pathinfo($product->image, PATHINFO_EXTENSION) === 'mp4')
                    <!-- If it's an mp4 video, display it as a video -->
                      <video  controls controlsList="nodownload">
                        <source src="{{ asset('storage/' . $product->image) }}" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                  @else
                    <!-- Item img -->
                    <div class="item-img">
                      <img class="img-1 img-responsive" src="{{asset('storage/' . $product->image)}}" alt="">
                      <!-- Overlay -->
                      <div class="overlay">
                        <div class="position-center-center">
                          <div class="inn">
                            <a href="{{asset('storage/' . $product->image)}}" data-lighter><i class="icon-magnifier"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                    <!-- Item Name -->
                    <div class="item-name">
                        <a href="{{ route('product.detail', ['category' => $product->category, 'brand' => $product->brand, 'type' => $product->type, 'series' => $product->series]) }}"><h5 class="item-name-title">{{ $product->title }}</h5></a>
                      <p>{{ Str::limit(strip_tags($product->body), 100) }}</p> 
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            <!-- Pagination -->
            <ul class="pagination pagination-product">
              {{ $products->links() }}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
