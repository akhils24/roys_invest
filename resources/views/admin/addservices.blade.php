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
                        <div class="card-title">ADD SERVICES</div>
                    </div>
                    <form method="POST" action="/addservices" enctype="multipart/form-data" id="ServiceForm">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="name">Service Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Service Name" name="name" value="{{ old('name') }}" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="description">Service Description</label>
                                    <input type="text" class="form-control" id="description" placeholder="Enter Service Description" name="description" value="{{ old('description') }}" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="icon">Service Icon</label>
                                    <input type="text" class="form-control" id="icon" placeholder="Enter Service Icon" name="icon" value="{{ old('icon') }}" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group"> 
                                    <label for="img1" class="d-block">Background Image</label> 
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
