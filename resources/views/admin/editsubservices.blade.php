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
                        <div class="card-title">EDIT SUB SERVICE </div>
                    </div>
                    <form method="POST" action="{{ route('admin.editsubservices',$subservice->id) }}" enctype="multipart/form-data" id="ContentForm">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="name">Service Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $subservice->name }}" required/>
                                </div>
                            </div>
                            
                           <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                  <label for="Category">Select Service Category</label>
                                  <select class="form-control form-control" id="Category" name="category" value="{{ $subservice->category }}" required>
                                      <option value="" disabled selected>Select Category</option>
                                       @foreach($services as $service)
                                            <option value="{{ $service->id }}" {{ $subservice->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                        @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Description" name="description" value="{{ $subservice->description }}" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group"> 
                                    <label for="img1" class="d-block">Service Image</label> 
                                    <input type="file" class="form-control-file" id="img1" name="img1" />
                                    <input type="hidden" name="old_img1" value="{{ $subservice->image }}">
                                    <div class="mt-2">
                                        <img id="preview1" src="{{ $subservice->image ? asset('public_storage/'.$subservice->image) : '' }}" width="150" class="{{ $subservice->image ? '' : 'd-none' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="content">Service Content</label>
                                    <input type="hidden" name="content" id="content" value="{{ old('content', $subservice->content) }}">
                                    <div id="editor" style="height: 500px; background: #fff;"></div>
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
  // Quill setup
  var quill = new Quill('#editor', {
    theme: 'snow',
    placeholder: 'Write your Content here...',
    modules: {
      toolbar: [
        [{ header: [1, 2, false] }],
        ['bold', 'italic', 'underline'],
        [{ list: 'ordered' }, { list: 'bullet' }],
        ['link'],
        ['clean']
      ]
    }
  });

  // Load old/blog content into Quill
  const hiddenContent = document.getElementById("content");
  if (hiddenContent.value) {
    quill.clipboard.dangerouslyPasteHTML(hiddenContent.value);
  }

  // Sync Quill content to hidden input before submit
  const form = document.getElementById("ContentForm");
  form.addEventListener("submit", function () {
    hiddenContent.value = quill.root.innerHTML.trim();
  });

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
  setupImagePreview("img2", "preview2");
});
</script>

