@extends('layout/main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Kategori Postingan</h1>
</div>
@if(Session()->has('insertSuccess'))
<div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
  {{ session('insertSuccess') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="table-responsive col-lg-6">
  <a class="btn btn-primary" href="/Kategori/create">
      Create new category
  </a>
  <br>
  <br>
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Category Name</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $Kategori as $catego )
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{ $catego->name }}</td>
          <td>
            <a href="/Kategori/{{ $catego->slug }}/edit" class="badge bg-success"><i class="bi bi-pencil"></i></a>
            <form action="/Kategori/{{ $catego->slug }}" method="post" class="d-inline">
              {{-- bajak methodnya menjadi delete --}}
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" type="submit" onclick="return confirm('Are you sure ?')"><i class="bi bi-trash3"></i></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
  </script>
@endsection
