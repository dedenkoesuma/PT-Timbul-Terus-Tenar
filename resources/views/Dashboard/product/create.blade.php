@extends('Dashboard.layouts.main')
@section('page')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambahkan Product </h1>
      </div>
      <a class="btn btn-danger mb-3" href="/dashboard/product">
            <span data-feather="arrow-left" width="15"class="me-3" ></span>
            Kembali
        </a>
        
      <div class="col-lg-8 mt-5"> 
       <form method="post" action="/dashboard/product" enctype="multipart/form-data">
          @csrf
          <!-- title -->
          <div class="mb-3">
            <label for="title" class="form-label">Nama Product</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"  name="title"placeholder="Input Name" required autofocus value="{{ old('title') }}">
            @error('title')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>
          
          <!-- category -->
          <div class="mb-3">
              <label for="category">Pilih Category:</label>
              <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
              <option disabled selected value> -- Select an Category -- </option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
              </select>
              @error('category')
              <div class="Invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>


          <!-- select brand -->
          <div class="mb-3">
          <label for="brand">Pilih Brand:</label>
            <select class="form-select @error('brand') is-invalid @enderror" id='brand' name="brand">
            <option disabled selected value> -- Select an Brand -- </option>
              @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
              @endforeach
            </select>
          @error('brand')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>

          <!-- select type -->
          <div class="mb-3">
          <label for="type">Masukan Type:</label>
          <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"  name="type"placeholder="Input Type Product" required autofocus value="{{ old('type') }}">
            </select>
          @error('type')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>

          <!-- select series -->
          <div class="mb-3">
          <label for="series">Masukan Series:</label>
          <input type="text" class="form-control @error('series') is-invalid @enderror" id="series"  name="series"placeholder="Input series Product" required autofocus value="{{ old('series') }}">
          @error('series')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>
        
          <!--uploud foto-->
          <div class="mb-3">
          <label for="image" class="form-label">Unggah Foto</label>
          <input class="form-control @error('image') is-invalid @enderror border-1 p-1" type="file" id="image" name="image">
          @error('image')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        <!-- sumeernote -->
        <div class="mb-3" >
          <label for="body" class="form-label">Body</label>
          @error('body')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <textarea id="summernote" name="body"></textarea>
          <!-- menghilangkan fitur uploud file -->
        </div>
        
        
        </div>        
        <button type="submit" class="btn btn-danger mb-4" >Tambahkan Product</button>
       </form>
      </div>
    </main>

  @endsection
