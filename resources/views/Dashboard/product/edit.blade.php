@extends('Dashboard.layouts.main')
@section('page')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <!-- title -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Product </h1>
      </div>
      <!-- end title  -->
      
      <a class="btn btn-danger mb-3" href="/dashboard/product">
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
       <form method="POST" action="/dashboard/product/{{ $products->id }}" enctype="multipart/form-data">
        @method('put')
          @csrf
          <!-- title form -->
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"  name="title"placeholder="Input Title" required autofocus value="{{ old('title', $products->title) }}">
            @error('title')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>
          <!-- title end -->

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

          <!-- type form -->
          <div class="mb-3">
              <label for="type" class="form-label">Masukan Type</label>
              <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"  name="type"placeholder="Input type" required autofocus value="{{ old('type', $products->type) }}">
              @error('type')
            <div class="Invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <!-- type end -->
          <!-- type form -->
          <div class="mb-3">
              <label for="series" class="form-label">Masukan Series</label>
              <input type="text" class="form-control @error('series') is-invalid @enderror" id="series"  name="series"placeholder="Input series" required autofocus value="{{ old('series', $products->series) }}">
              @error('series')
            <div class="Invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <!-- type end -->

          <!-- uploud foto -->
          <div class="mb-3">
          @if($products->image)
          <img src="{{ asset('storage/'.$products->image) }}" class="img-preview img-fluid mb-3 col-sm-5">
          @else
          
          <img id="imagePreview" class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset('storage/'.$products->image) }}" />
          @endif
          <input class="form-control @error('image') is-invalid @enderror border-1 p-1" type="file" id="image" name="image" onchange="previewImage()" >
          @error('image')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <input type="hidden" name="original_id" value="{{ $products->id }}">
        <!-- uploud end -->
        
        <!-- trix box -->
           <!-- sumeernote -->
          <div class="mb-3" >
          <label for="body" class="form-label">Body</label>
          @error('body')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <textarea id="summernote" name="body">{{ old('body', $products->body) }}</textarea>
          <!-- menghilangkan fitur uploud file -->
          </div>

        <button type="submit" class="btn btn-danger mb-4" >Edit Product</button>
       </form>
      </div>
      </main>
  @endsection


