@extends('Dashboard.layouts.main')
@section('page')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <!-- title -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Slider </h1>
      </div>
      <!-- end title  -->
      
      <a class="btn btn-danger mb-3" href="/dashboard/slider">
            <span data-feather="arrow-left" width="15"class="me-3" ></span>
            Kembali
      </a>
      <!-- alert success -->
      @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif
      <!-- end alert -->
      <div class="col-lg-8 mt-5"> 
       <form method="POST" action="/dashboard/slider/{{ $sliders->id }}" enctype="multipart/form-data">
          @method('put')
          @csrf
          <!-- title form -->
          <div class="mb-3">
            <label for="name" class="form-label">Nama Product</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" placeholder="Input name" required autofocus value="{{ old('name', $sliders->name) }}">
            @error('name')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>
          <!-- title end -->
        
         <!-- category -->
         <div class="mb-3">
          <label for="option1">Pilih product:</label>
            <select class="form-select @error('product_id') is-invalid @enderror" id='product_id' name="product_id">
                </select>
          @error('category')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>
          <!-- category end -->

          <!-- uploud foto -->
          <div class="mb-3">
          @if($sliders->media)
          <img src="{{asset('storage/'. $sliders->media)}}" class="img-preview img-fluid mb-3 col-sm-5">
          @else
          <img id="imagePreview" class="img-preview img-fluid mb-3 col-sm-5" src="{{asset('storage/'. $sliders->media)}}" />
          @endif
          <input class="form-control @error('media') is-invalid @enderror border-1 p-1" type="file" id="media" name="media" onchange="previewImage()" >
          @error('media')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <input type="hidden" name="original_id" value="{{ $sliders->id }}">
        <!-- uploud end -->
        <button type="submit" class="btn btn-danger mb-4">Edit Product</button>
       </form>
      </div>
      </main>
      
   <!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
$(document).ready(function () {
    // Select2 initialization for Product ID
    $("#product_id").select2({
        placeholder: 'Pilih Product',
        ajax: {
            url: "{{ route('get.products') }}", // Menggunakan route yang baru
            dataType: 'json',
            delay: 250, // Tunggu 250 ms setelah pengguna selesai mengetik

            // Mengambil data berdasarkan input pengguna
            processResults: function (data) {
                return {
                    results: $.map(data.results, function (item) {
                        return {
                            id: item.id, // Menggunakan 'id' sebagai ID
                            text: item.text //kan 'name' sebagai teks opsi
                        };
                    })
                };
            },
            cache: true
        }
    });
});
    // Menambahkan event listener ketika nilai Product ID berubah
    $("#product_id").on('change', function () {
        var selectedProductId = $(this).val();
        // Menyimpan selectedProductId dalam atribut data-product-id
        $(this).data('product-id', selectedProductId);
    });

        
  </script>
    

  @endsection


