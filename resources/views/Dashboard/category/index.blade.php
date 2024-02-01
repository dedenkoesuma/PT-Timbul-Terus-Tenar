@extends('Dashboard.layouts.main')
@section('page')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Category PT.Timbul Terus Tenar</h1>
      </div>
      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        <a href="/dashboard/category/create" class="btn btn-danger mb-3">Unggah Category</a>
          <div class="table-responsive small ">
          <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name Category</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td> 
              <a class="badge bg-info" href="/dashboard/category/{{$category->id}}">
                <span data-feather="eye" width="15"></span>
              </a>
              <a class="badge bg-warning" href="/dashboard/category/{{$category->id}}/edit">
                <span data-feather="edit" width="15"></span>
              </a>
              <form action="/dashboard/category/{{$category->id}}" method="post" class="d-inline-block">
                  @method('delete')
                  @csrf
                  <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin Ga nih?')">
                      <span data-feather="x-circle" width="15"></span>
                  </button>
              </form>

              </td>  
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
          </div>
         
    </main>
    
  @endsection

