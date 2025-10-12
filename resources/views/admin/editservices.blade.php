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
                        <div class="card-title">EDIT SERVICES</div>
                    </div>
                    <form method="POST" action="{{ route('admin.editservices',$service->id) }}" enctype="multipart/form-data" id="ServiceForm">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="name">Service Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Service Name" name="name" value="{{ $service->name }}" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="description">Service Description</label>
                                    <input type="text" class="form-control" id="description" placeholder="Enter Service Description" name="description" value="{{ $service->description }}" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="icon">Service Icon</label>
                                    <input type="text" class="form-control" id="icon" placeholder="Enter Service Icon" name="icon" value="{{ $service->icon }}" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group"> 
                                    <label for="img1" class="d-block">Background Image</label> 
                                    <input type="file" class="form-control-file" id="img1" name="image" />
                                    <input type="hidden" name="old_img1" value="{{ $service->image }}">
                                    <div class="mt-2">
                                        <img id="preview1" src="{{ $service->image ? asset('storage/'.$service->image) : '' }}" width="150" class="{{ $service->image ? '' : 'd-none' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
document.addEventListener("DOMContentLoaded", function () {

  // Image preview logic (if you want it here too)
  function setupImagePreview(inputId, previewId) {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);

    input.addEventListener("change", function (event) {
      const file = event.target.files[0];
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
  setupImagePreview("img1", "preview1");
});

</script>
