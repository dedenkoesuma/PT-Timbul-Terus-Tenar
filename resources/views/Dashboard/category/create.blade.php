@extends('Dashboard.layouts.main')
@section('page')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambahkan Category </h1>
      </div>
      <a class="btn btn-danger mb-3" href="/dashboard/category">
            <span data-feather="arrow-left" width="15"class="me-3" ></span>
            Kembali
        </a>
        
      <div class="col-lg-8 mt-5"> 
       <form method="post" action="/dashboard/category" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Category</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" placeholder="Input name" required autofocus value="{{ old('name') }}">
            @error('name')
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
        <button type="submit" class="btn btn-danger mb-4" >Tambahkan Category</button>
       </form>
      </div>
    </main>

  @endsection


