@extends('layouts.app')
@section('page')


<!-- Slider Area -->
<section class="slider">
			<div class="hero-slider">
				<!-- Start Single Slider -->
        @foreach($banner as $index => $product)
				<div class="single-slider" style="  background-image: url({{asset('storage/' . $product->media)}})">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="text">
                <p>New Product </p>
									<h1>{{$product->name}}</h1>
									
									<div class="button">
										<a href="{{ route('product.detail', ['category' => $product->product->category, 'brand' => $product->product->brand, 'type' => $product->product->type, 'series' => $product->product->series]) }}" class="btn">More Product</a>
									</div>
								</div>
							</div>		
						</div>
					</div>
				</div>
        @endforeach
				<!-- End Single Slider -->
			</div>
		</section>
		<!--/ End Slider Area -->
          
    <section class="shop-page padding-top-100 padding-bottom-100">
      <div class="container">
        <!-- Main Heading -->
        <div class="heading text-center">
          <h4>Our Product</h4>
      </div>
       <!-- Product Items -->
       <div class="papular-block row single-img-demos our-product">
              @foreach($products as $product)
                <!-- Item -->
                <div class="col-md-3">
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
                    </div>
                  @endif
                    <!-- Item Name -->
                    <div class="item-name">
                        <a href="{{ route('product.detail', ['category' => $product->category, 'brand' => $product->brand, 'type' => $product->type, 'series' => $product->series]) }}"><h5 class="item-name-title">{{ $product->title }}</h5></a>
                      <p>{{ Str::limit(strip_tags($product->body), 100) }}</p>
                    </div>
                    <!-- Price -->
                   
                  </div>
                </div>
              @endforeach
            </div>
            <!-- Pagination -->
            <ul class="pagination ">
              {{ $products->links() }}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Popular Products -->
  <section class="padding-top-150 padding-bottom-150">
    <div class="container">

      <!-- Main Heading -->
      <div class="heading text-center">
        <h4>{{__('category product')}}</h4>
      </div>

      <!-- NEW ARRIVAL -->
      <div class="shop-items row" style="text-align:center;">
        
          @foreach($categories as $index => $category)
         <!-- Item -->
          <div class="col-md-6">
            <div class="item"> 
              <!-- Item Name -->
              <div class="item-name"> 
                
              </div>
              <!-- Item img -->
              <div class="item-img"> <img class="img{{$index+1}} image132" src="{{asset('storage/' . $category->media)}}" widt="570px" height="398px" alt="" > 
               
              </div>
              <!-- Price --> 
                <h4 class="margin-top-20">{{ $category->name }}</h4>
                <div class="text-center"> <a href="{{  route('products.filter', ['category' => $category->name]) }}" class="btn btn-small btn-round"> MORE</a> </div>
              </div>
          </div>
             @endforeach
          
      </div>
    </div>
    <div class="text-center margin-top-50"> <a href="/product" class="btn btn-small btn-round"> SHOW MORE</a> </div>
  </section>
  @endsection
