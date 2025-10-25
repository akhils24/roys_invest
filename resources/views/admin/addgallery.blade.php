@extends('admin.layouts.admin')
@section('content')
    <div>
<<<<<<< HEAD
=======
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
>>>>>>> 2d28ab4febec7745721a0f1359c25df92bbcc766
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
                        <div class="card-title">ADD IMAGE</div>
                    </div>
<<<<<<< HEAD
                    <form method="POST" action="{{ route('admin.store_image') }}" enctype="multipart/form-data" id="imageForm">
=======
                    <form method="POST" action="{{ route('admin.creategallery') }}" enctype="multipart/form-data" id="GalleryForm">
>>>>>>> 2d28ab4febec7745721a0f1359c25df92bbcc766
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="title">Image Title</label>
<<<<<<< HEAD
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title" name="title" value="{{ old('title') }}" required/>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group"> 
                                    <label for="image_file" class="d-block">Upload Image</label> 
                                    <input type="file" class="form-control-file @error('image_file') is-invalid @enderror" id="image_file" name="image_file" required /> 
                                    @error('image_file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6 col-sm-4">
                                    <label class="imagecheck mb-4">
                                        <figure class="imagecheck-figure"> 
                                            <img id="preview" src="" alt="Image Preview" class="imagecheck-image d-none" /> 
                                        </figure>
                                    </label>
                                </div>
                            </div>

=======
                                    <input type="text" class="form-control" id="title" placeholder="Enter Image Title" name="name" value="{{ old('title') }}" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                  <label for="Category">Select Image Category</label>
                                  <select class="form-control form-control" id="Category" name="category" value="{{ old('category') }}" required>
                                      <option value="" disabled selected>Select Category</option>
                                        @foreach($categories as $category)
                                          <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                  </select>
                                </div>
                            </div>
>>>>>>> 2d28ab4febec7745721a0f1359c25df92bbcc766
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <input type="number" class="form-control @error('priority') is-invalid @enderror" id="priority" name="priority" value="{{ old('priority', 1) }}" required/>
                                    <small class="form-text text-muted">Lower number = higher priority</small>
                                    @error('priority')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
<<<<<<< HEAD

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select class="form-control" id="is_active" name="is_active" required>
                                        <option value="1" {{ old('is_active') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-8">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
=======
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
>>>>>>> 2d28ab4febec7745721a0f1359c25df92bbcc766
                                </div>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD

                    <div class="card-action">
                        <button class="btn btn-success">Submit</button>
                        <a href="{{ route('admin.gallery') }}" class="btn btn-secondary">Cancel</a>
=======
                    <div class="card-action">
                        <button class="btn btn-success">Submit</button>
>>>>>>> 2d28ab4febec7745721a0f1359c25df92bbcc766
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
<<<<<<< HEAD
document.addEventListener("DOMContentLoaded", function () {
    // Image preview function
    const imageInput = document.getElementById("image_file");
    const preview = document.getElementById("preview");

    imageInput.addEventListener("change", function (event) {
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
});
</script>
=======
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
>>>>>>> 2d28ab4febec7745721a0f1359c25df92bbcc766
