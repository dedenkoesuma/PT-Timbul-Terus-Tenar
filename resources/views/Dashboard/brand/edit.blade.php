@extends('Dashboard.layouts.main')
@section('page')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <!-- title -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Product </h1>
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
        @method('PUT')
          @csrf
          <!-- title form -->
          <div class="mb-3">
            <label for="name" class="form-label">Nama Product</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name"placeholder="Input name" required autofocus value="{{ old('name', $sliders->name) }}">
            @error('name')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>
          <!-- title end -->
        
          <!-- category -->
         <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select @error('category') is-invalid @enderror" id='category' name="category" >
          <option value="fotografi @if(old('category', $sliders->category) == 'cutting')@endif">Cutting Tools </option>
          <option value="desaingrafis @if(old('category', $sliders->category) == 'abrasive')@endif" >Abrasive</option>
          <option value="videografi @if(old('category', $sliders->category) == 'pelumas')@endif">Pelumas </option>
          </select>
          @error('category')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>
          <!-- category end -->

          <!-- uploud foto -->
          <div class="mb-3">
          <label for="media" class="form-label">Unggah Media</label>
          @if($sliders->media)
          <img src="{{ asset('storage/'. $sliders->media) }}" class="img-preview img-fluid mb-3 col-sm-5">
          @else
          <img id="imagePreview" class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset('storage/'. $sliders->media) }}" />
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
        
        <!-- trix box -->
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body', $sliders->body) }}">
          <trix-editor input="body"></trix-editor>
          <!-- menghilangkan fitur uploud file -->
          <style>
            trix-toolbar [data-trix-button-group="file-tools"]{
              display: none;
            }
          </style>
        </div>
        <!-- trixbox end -->
        <button type="submit" class="btn btn-danger mb-4" >Edit Product</button>
       </form>
      </div>
      </main>
  @endsection


