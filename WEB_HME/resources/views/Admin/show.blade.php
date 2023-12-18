@extends('layout/main')

@section('container')
<div class="mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article>
                <h2>{{ $post->title}}</h2>
                <a href="/BeritaAdmin" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i> Back to my all post</a>
                <a href="/BeritaAdmin/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
                <form action="/BeritaAdmin/{{ $post->slug }}" method="post" class="d-inline">
                    {{-- bajak methodnya menjadi delete --}}
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure ?')"><i class="bi bi-trash3"></i></i> Delete</button>
                  </form>
                  {{-- jika ada isi field di image --}}
                  @if ($post->image)
                   <div style="max-height: 315px; overflow:hidden">
                    {{-- <img src="{{ asset('storage/'.$post->image) }}" alt="{{ asset('storage/'.$post->image) }}" class="img-fluid mt-3"> --}}
                    <img src="{{ asset('storage/'.$post->image) }}" alt="{{ asset('storage/'.$post->image) }}" class="img-fluid mt-3" style="height:300px; width:100%;">
                   </div>
                  @else
                  <img src="https://source.unsplash.com/800x400?{{ $post->Kategori->name }}" alt="{{ $post->Kategori->name }}" class="img-fluid mt-3" >
                  @endif
                 <p>{!! $post->body !!}</p>
             </article>
        </div>
    </div>
</div>
@endsection