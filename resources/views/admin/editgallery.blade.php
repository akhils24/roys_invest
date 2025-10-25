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
                        <div class="card-title">EDIT IMAGE</div>
                    </div>
                    <form method="POST" action="{{ route('admin.editgallery',$gallery->id) }}" enctype="multipart/form-data" id="GalleryForm">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="title">Image Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter Image Title" name="name" value="{{ old('title',$gallery->title) }}" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                  <label for="Category">Select Image Category</label>
                                  <select class="form-control form-control" id="Category" name="category" value="{{ old('category',$gallery->category_id) }}" required>
                                      <option value="" disabled selected>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ $gallery->category_id == $category->id ? 'selected' : " " }}>{{ $category->name }}</option>
                                        @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <input type="number" class="form-control @error('priority') is-invalid @enderror" id="priority" name="priority" value="{{ old('priority', $gallery->priority) }}" required/>
                                    <small class="form-text text-muted">Lower number = higher priority</small>
                                    @error('priority')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group"> 
                                    <label for="img1" class="d-block">Background Image</label> 
                                    <input type="file" class="form-control-file" id="img1" name="image" />
                                    <input type="hidden" name="old_img1" value="{{ $gallery->image }}">
                                    <div class="mt-2">
                                        <img id="preview1" src="{{ $gallery->image ? asset('storage/'.$gallery->image) : '' }}" width="150" class="{{ $gallery->image ? '' : 'd-none' }}">
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
