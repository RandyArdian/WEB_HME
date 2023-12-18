@extends('layout/main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Position</h1>
  </div>
  <div class="col-lg-8">
      <form method="post" action="/position">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama Posisi</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="position_name"  autofocus value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
           </div>
            @enderror
          </div>
          <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly  value="{{ old('slug') }}">
              @error('slug')
                <div class="invalid-feedback">
                {{ $message }}
                 </div>
              @enderror
           </div> 
          <button type="submit" class="btn btn-primary mb-3">Add New posisi</button>
        </form>
  </div>
  <script>
    // cara pake fetch api
    const name=document.querySelector('#name');
    const slug = document.querySelector('#slug');
  
    name.addEventListener('change', function(){
      fetch('/position/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value=data.slug)
    });
  
  </script>
@endsection