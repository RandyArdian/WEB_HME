@extends("layout/main")
    @section("container")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil admin {{ $user->name }}</h1>
      </div>
      <div class="row">
          <div class="col">
              <div  class=" alert-warning rounded" style="height:100%; ">
              <p style="position:relative; top:10px; left:5px;">
              <i class="bi bi-exclamation-triangle"></i>
              Password harus diubah di pengaturan
              </p>
              </div> 
          </div>
      </div>
      @if(Session()->has('sukses'))
      <div class="row mt-2">
        <div class="col-md">
                    <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
                      {{ session('sukses') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
        </div>
      </div>
      @endif
      <br>
      <div class="border border-primary" style="width:100%; height:50%;"> 
        <form method="post" action="/profilUpdate/{{ $user->slug }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" value="{{ $user->img }}" name="OldImage">
      <div class="row bg-primary w-100 position-relative"  style="position: relative;left:12px; height:30px;"><div class="col-md text-light" style="font-size: 17px ;">Data Admin</div></div>
      <div class="row mt-3 ms-2">
        <div class="col-md-6">
            <label for="">Foto</label>
                @if($user->img==null)
                   <label for="" style="display:inline; margin-bottom:15px;" class="text-warning">*Belum ada foto</label>
                   <img src="" alt="" class="img-preview img-fluid col-sm-3  mb-3">
                @else
                <div class="card mb-2" style="width: 18rem;" >
                    <img src="{{ asset("storage/".$user->img) }}" class="card-img-top img-preview img-fluid col-sm-3" alt="..." >
                </div>
                @endif 
                <input class="form-control"  @error('image') is-invalid @enderror type="file" id="image" name="img" style="width:90%;"  onchange="previewImage()"> 
                @error('img')
                <div class="invalid-feedback">
                  {{ $message }}
               </div>
                @enderror
            <label for="">Nama</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" value="{{ old('pas',$user->name) }}" name="name" style="width:90%;">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
           </div>
            @enderror
            <br>
         </div>
         <div class="col-md-6">
            <label for="">Username</label>
            <input type="text" class="form-control  @error('username') is-invalid @enderror" value="{{ old('pas',$user->username) }}" name="username" style="width:90%;">
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
           </div>
            @enderror
            <label for="">Email</label>
            <input type="text" class="form-control  @error('email') is-invalid @enderror" value="{{ old('pas',$user->email) }}" name="email" style="width:90%;">
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
           </div>
            @enderror
         </div>
      </div>
      <br>
      
    </div>
    <div class="row">
        <div class="col-md py-3 d-flex justify-content-end">
            <button class="btn btn-success" type="submit" name="ubah"> Ubah biodata</button>
        </div>
    </div>
  </form>
    <script>
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
      <!-- Content Row -->
    @endsection