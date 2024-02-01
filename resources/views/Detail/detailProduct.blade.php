@extends('layouts.app')
@section('page')
<?php

// Mengambil konten body dari produk
$bodyContent = $product->body;

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



<section class="sub-bnr" data-stellar-background-ratio="0.5">
    <div class="position-center-center">
        <div class="container">
            <ol class="breadcrumb breadcrumb1">
                <li><a href="/">Home</a></li>
                <li><a href="/product">Product</a></li>
                <li><a href="{{ route('product.detail', ['category' => $product->category, 'brand' => $product->brand, 'type' => $product->type, 'series' => $product->series]) }}">Detail</a></li>
                <li><a href="{{ url('/product/filter?category=' . urlencode($product->category)) }}">{{ $product->category }}</a></li>
                <li><a href="{{ url('/product/filter?brand=' . urlencode($product->brand)) }}">{{ $product->brand }}</a></li>
                <li><a href="{{ url('/product/filter?type=' . urlencode($product->type)) }}">{{ $product->type }}</a></li>
                <li><a href="{{ url('/product/filter?series=' . urlencode($product->series)) }}">{{ $product->series }}</a></li>
            </ol>
        </div>
    </div>
</section>
   <!-- Content -->
   <div id="content"> 
    
    <!-- Popular Products -->
    <section class="padding-top-100 padding-bottom-100">
      <div class="container"> 
        
        <!-- SHOP DETAIL -->
        <div class="shop-detail">
          <div class="row"> 
            
            <!-- Popular Images Slider -->
            <div class="col-md-7"> 
            @if(pathinfo($product->image, PATHINFO_EXTENSION) === 'mp4')
                <video controls controlsList="nodownload" class="img-responsive col-md-6 col-xs-12">
                    <source src="{{ asset('storage/' . $product->image) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                        <img id="zoom_01" class="shop-item-detail-photo-active img-responsive" alt="photo item active" src="{{ asset('storage/' . $product->image) }}" data-zoom-image="{{ asset('storage/' . $product->image) }}"/>
            @endif
            </div>
            
            <!-- COntent -->
            <div class="col-md-5">
              <h4>{{$product->title}}</h4>
              <!-- Sale Tags -->
              <ul class="item-owner">
                <li>Brand:<span> {{$product->brand}}</span></li>
              </ul>
              
              <!-- Item Detail -->
              <p>{{ Str::limit(strip_tags($product->body), 200) }}</p>
              
              <!-- Short By -->
              <div class="some-info">
                
                <!-- INFOMATION -->
                <div class="inner-info">
                  <h6><a href="#">Requst Trial</a></h6>
                  <h6><a href="#RequstRFQ">Request RFQ</a></h6>
                  <h6>SHARE THIS PRODUCT</h6>
                  
                  <!-- Social Icons -->
                  <ul class="social_icons">
                    <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                    <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                    <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
                    <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                    <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!--======= PRODUCT DESCRIPTION =========-->
        <div class="item-decribe"> 
          <!-- Nav tabs -->
          <ul class="nav nav-tabs animate fadeInUp" data-wow-delay="0.4s" role="tablist">
            <li role="presentation" class="active"><a href="#descr" role="tab" data-toggle="tab">DETAIL</a></li>
            <li role="presentation"><a href="#tags" role="tab" data-toggle="tab">CONTACT</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content animate fadeInUp" data-wow-delay="0.4s"> 
            <!-- DESCRIPTION -->
            <div role="tabpanel" class="tab-pane fade in active" id="descr">
                @if (!empty($imageUrl))
                    {!! $bodyWithStyles !!}
                    <br>
                @elseif(empty($imageUrl))
                <?php
                echo $product->body;
                ?>
                
                @endif
              <button class="btn margin-top-20 margin-bottom-20" onclick="openModal()" id="RequstRFQ">Requst RFQ & Trial</button>

      <!-- Modal -->
      <div id="myModal" class="modal">
          <div class="modal-content">
              <span onclick="closeModal()" style="float: right; cursor: pointer;">&times;</span>
              <form class="ml15" method="post" action="{{ route('product.send') }}">
                  @csrf
                  <div class="row">
                      <div class="col-md-12 col-sm-12 pt10 bt-dotted-1">
                          <div class="form-group col-md-6 col-sm-6 col-xs-12">
                              <label for="nama_lengkap">Name:</label>
                              <input type="text" name="name" id="name" class="input-md input-rounded form-control" placeholder="full name" maxlength="100" required>
                          </div>
                          <div class="form-group col-md-6 col-sm-6 col-xs-12">
                              <label for="email">Email:</label>
                              <input type="email" name="email" id="email" class="input-md input-rounded form-control" placeholder="email" maxlength="100" required>
                          </div>
                          <div class="form-group col-md-6 col-sm-6 col-xs-12">
                              <label for="nomor_telepon">Phone number:</label>
                              <input type="tel" name="phone" id="phone" class="input-md input-rounded form-control" placeholder="Phone" maxlength="100">
                          </div>
                          <div class="form-group col-md-6 col-sm-6 col-xs-12">
                              <label for="namaPerusahaan">Company Name:</label>
                              <input type="text" name="namaPerusahaan" id="namaPerusahaan" class="input-md input-rounded form-control" placeholder="Company Name" required>
                          </div>
                          <div class="form-group col-md-6 col-sm-6 col-xs-12">
                              <label>Qty:</label>
                              <input type="number" min="0" name="qty" class="form-control input-md input-rounded shop-item-quantity pull-left mr20" placeholder="Quantity">
                              <input type="hidden" name="nameProduct" value="{{ $product->title }}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 col-sm-12 xol-xs-12 mt10 pt10 bt-dotted-1">
                          <button class="btn margin-top-20 margin-bottom-20" type="submit">Add To Request <i class="fa fa-group"></i></button>
                          <a class="btn margin-top-20 margin-bottom-20" href="{{ url('/trial') }}">Request Trial</a>
                      </div>
                  </div>
              </form>
          </div>
      </div>
            </div>
            
            <!-- TAGS -->
            <div role="tabpanel" class="tab-pane fade" id="tags"> 
                
            <!--======= ADDRESS INFO  =========-->
              <div class="contact-info">
                <h6>{{__('addres')}}</h6>
                <ul>
                  <li> <i class="icon-map-pin"></i> Citra Raya Ruko Rembrandt R01 / 50R Cikupa Tangerang Banten 15710</li>
                  <li> <i class="icon-call-end"></i>(021)5964 7597</li>
                  <li> <i class="icon-envelope"></i> <a href="mailto:sales@pt-ttt.co.id" target="_top">sales@pt-ttt.co.id</a> </li>
                </ul>
              </div>
            <!--  -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <style>
    .modal {
        display: none;
        position: fixed;
        z-index: 9;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
    }
    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }
    button.btn::hover {
        border: 1px #071B5C solid;
        color: #071B5C;
    }
    .check-icon {
        display: none;
        margin-right: 5px;
    }
    .copied-text {
        display: none;
    }
    .icon:hover {
        color: #071B5C;
    }
    .check-icon:hover {
        margin-right: 5px;
    }
    .copied-text:hover {
        color: #071B5C;
    }
</style>
    
<script>
    function openModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'block';
    }
    function closeModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = 'none';
    }
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
</script>
@endsection
