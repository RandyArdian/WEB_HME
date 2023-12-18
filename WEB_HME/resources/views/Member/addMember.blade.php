@extends('layout/main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Member </h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/Member" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Nama</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="name"  autofocus value="{{ old('name') }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
         </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Jenis Kelamin</label>
          <select class="form-select @error('Jenis_kelamin') is-invalid @enderror"  name="Jenis_kelamin">
            <option>===Pilihan====</option>
            <option value="Laki-laki" @if(old('Jenis_kelamin') =='Laki-laki') {{ 'selected' }} @endif>Laki-laki</option>
            <option value="Perempuan" @if(old('Jenis_kelamin')=='Perempuan'){{ 'selected' }}  @endif>Perempuan</option>
          </select>
          @error('Jenis_kelamin')
          <div class="invalid-feedback">
            {{ $message }}
         </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="position_id" class="form-label">Posisi</label>
          <select name="position_id" id="category_id" class="form-select @error('position_id') is-invalid @enderror">
            <option value="">Pilih posisi</option>
           @foreach( $position as $category)
           @if(old('position_id') == $category->id)
             <option value="{{ $category->id }}" selected>{{ $category->position_name }}</option>
           @else
           <option value="{{ $category->id }}">{{ $category->position_name }}</option>
           @endif
           @endforeach
          </select>
          @error('position_id')
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
       <div class="mb-3">
        <label for="image" class="form-label ">Member Image</label>
        <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-3 d-block">
        <input class="form-control @error('Img') is-invalid @enderror" type="file" id="image" name="Img" onchange="previewImage()">
        @error('Img')
              <div class="invalid-feedback">
              {{ $message }}
               </div>
        @enderror
      </div>
        <button type="submit" class="btn btn-primary mb-3">Create Member</button>
      </form>
</div>
<script>
  // cara pake fetch api
  const title=document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function(){
    fetch('/Member/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value=data.slug)
  });

  // supaya upload file tidak dijalankan
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })

  function previewImage(){
  const image= document.querySelector('#image');
  const imgPreview=document.querySelector('.img-preview');

  imgPreview.style.display='block';

  const oFReader = new FileReader();

  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload= function(oFREvent){
    imgPreview.src=oFREvent.target.result;
  }
}
</script>
@endsection