@extends('admin.layouts.admin')
@section('content')
    <div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
        
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">ADD PARTNER DETAILS</div>
                    </div>
                    <form method="POST" action="{{ route('admin.createpartners') }}" enctype="multipart/form-data" id="GalleryForm">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="title">Partner Name</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter Partner Name" name="name" value="{{ old('name') }}" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="title">Partner Category</label>
                                    <input type="text" class="form-control" id="title" placeholder="Mutual Fund" name="category" value="Mutual Fund" required readonly/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group"> 
                                    <label for="img1" class="d-block">Partner Logo</label> 
                                    <input  type="file"  class="form-control-file"  id="img1" name="img1" value="{{ old('image') }}" required /> 
                                </div>
                                <div class="col-6 col-sm-4">
                                    <label class="imagecheck mb-4">
                                        <figure class="imagecheck-figure"> 
                                            <img  id="preview1" src="" alt="Service Image" class="imagecheck-image d-none" /> 
                                        </figure>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Image preview function
    function previewImage(inputId, previewId) {
      document.getElementById(inputId).addEventListener("change", function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById(previewId);
        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove("d-none");
          };
          reader.readAsDataURL(file);
        } else {
          preview.src = "";
          preview.classList.add("d-none");
        }
      });
    }
    previewImage("img1", "preview1");
  });
</script>
