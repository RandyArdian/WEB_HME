@extends("layout/main")
                    @section("container")
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2"> Welcome back, {{ auth()->user()->name }}</h1>
                    </div>
                    @if(Session()->has('insertSuccess'))
                    <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
                      {{ session('insertSuccess') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="table-responsive col-lg-8">
                      <a class="btn btn-primary" href="/BeritaAdmin/create">
                          Create new post
                      </a>
                    
                        <table  id="example" class="table table-striped" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Title</th>
                              <th scope="col">Category</th>
                              <th scope="col">action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach( $post as $posts )
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{ $posts->title }}</td>
                              <td>{{ $posts->Kategori->name }}</td>
                              <td>
                                <a href="/BeritaAdmin/{{ $posts->slug }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                                <a href="/BeritaAdmin/{{ $posts->slug }}/edit" class="badge bg-success"><i class="bi bi-pencil"></i></a>
                                <form action="/BeritaAdmin/{{ $posts->slug }}" method="post" class="d-inline">
                                  {{-- bajak methodnya menjadi delete --}}
                                  @method('delete')
                                  @csrf
                                  <button class="badge bg-danger border-0" type="submit" onclick="return confirm('Are you sure ?')"><i class="bi bi-trash3"></i></i></button>
                                </form>
                                <a href="/dashboard/posts/{{ $posts->slug }}" class="badge bg-danger"></a>
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