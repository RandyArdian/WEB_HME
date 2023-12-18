@extends("layout/main")
@section("container")

<div class="container-fluid">
    
    <div class="col-md-5">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Pengaturan akun</h1>
            <hr style="margin-top:-20px">
          </div>
            @if(Session()->has('failed'))
                        <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
                          {{ session('failed') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
             @endif
             @if(Session()->has('sukses'))
                        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
                          {{ session('sukses') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
             @endif
          <form  method="post" action="/Akun/{{ auth()->user()->slug }}">
            @csrf
            @method('put')
          <div class="border border-success rounded axx"> 
          <div class="alert-success">
            <div class="row text-center" style="height: 50px; line-height:50px;" >
              <div class="col">
              Pergantiaan Password
              </div>
            </div>
          </div>
          <div class="row ms-4 mt-3 " style="width:90%;">
             <div class="col-md-11">
                <label for="">Password lama</label>
                <input type="text"  class="form-control  @error('passwordlama') is-invalid @enderror" value="{{ old('passwordlama') }}" name="passwordlama">
                @error('passwordlama')
                <div class="invalid-feedback">
                  {{ $message }}
               </div>
                @enderror
             </div>
          </div>
          <div class="row ms-4 mt-3 " style="width:90%;">
            <div class="col-md-11">
               <label for="">Konfirmasi Password lama</label>
               <input type="text" class="form-control  @error('pas') is-invalid @enderror" value="{{ old('pas') }}" name="pas">
               @error('pas')
               <div class="invalid-feedback">
                 {{ $message }}
              </div>
               @enderror
            </div>
         </div>
          <div class="row mt-3 ms-4" style="width:90%;">
          <div class="col-md-11">
                <label for="">Password baru</label>
                <input type="password" class="form-control @error('pw') is-invalid @enderror" name="pw" value="{{ old('pw') }}">
                @error('pw')
                <div class="invalid-feedback">
                  {{ $message }}
               </div>
                @enderror
             </div>
          </div>
           <div class="row mt-3 ms-4" style="width:90%;">
           <div class="col-md-11 mb-3">
                <label for="">Konfirmasi password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                @error('pw_c')
                <div class="invalid-feedback">
                  {{ $message }}
               </div>
                @enderror
             </div>
           </div>
           <div class="row">
      
           </div>
          
          </div>
          <button class="btn btn-success mt-4" type="submit" name="ubah"> Ubah password</button>
          </form>
       </div>
    </div>
    <!-- Page Heading -->
    
 @endsection