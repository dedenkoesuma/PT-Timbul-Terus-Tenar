@extends('Dashboard.layouts.main')
@section('page')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Tambahkan Brand </h1>
      </div>
      <a class="btn btn-danger mb-3" href="/dashboard/brand">
            <span data-feather="arrow-left" width="15"class="me-3" ></span>
            Kembali
        </a>
        
      <div class="col-lg-8 mt-5"> 
       <form method="post" action="/dashboard/brand" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Brand</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" placeholder="Input name" required autofocus value="{{ old('name') }}">
            @error('name')
          <div class="Invalid-feedback">
              {{ $message }}
          </div>
          @enderror
          </div>

        </div>        
        <button type="submit" class="btn btn-danger mb-4" >Tambahkan Brand</button>
       </form>
      </div>
    </main>

  @endsection


