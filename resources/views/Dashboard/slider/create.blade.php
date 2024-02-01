@extends('Dashboard.layouts.main')
@section('page')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambahkan Slider </h1>
      </div>
      <a class="btn btn-danger mb-3" href="/dashboard/slider">
            <span data-feather="arrow-left" width="15"class="me-3" ></span>
            Kembali
        </a>
        
      <div class="col-lg-8 mt-5"> 
       <form method="post" action="/dashboard/slider" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Product</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" placeholder="Input name" required autofocus value="{{ old('name') }}">
            @error('name')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>
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
          <!-- media -->
          <div class="mb-3">
          <label for="media" class="form-label">Unggah Media</label>
          <input class="form-control @error('media') is-invalid @enderror border-1 p-1" type="file" id="media" name="media">
          @error('media')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        </div>        
        <button type="submit" class="btn btn-danger mb-4" >Tambahkan Slider</button>
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


