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
                        <div class="card-title">ADD BLOGS</div>
                    </div>
                    <form method="POST" action="/addblogs" enctype="multipart/form-data" id="blogForm">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="title">Blog title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title') }}" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group"> 
                                    <label for="img1" class="d-block">Image 1</label> 
                                    <input  type="file"  class="form-control-file"  id="img1" name="img1" value="{{ old('image1') }}" required /> 
                                </div>
                                <div class="col-6 col-sm-4">
                                    <label class="imagecheck mb-4">
                                        <figure class="imagecheck-figure"> 
                                            <img  id="preview1" src="" alt="Image 2" class="imagecheck-image d-none" /> 
                                        </figure>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group"> 
                                    <label for="img2" class="d-block">Image 2</label> 
                                    <input  type="file"  class="form-control-file"  id="img2" name="img2" value="{{ old('image2') }}"/> 
                                </div>
                                <div class="col-6 col-sm-4">
                                    <label class="imagecheck mb-4">
                                        <figure class="imagecheck-figure"> 
                                            <img  id="preview2" src="" alt="Image 2" class="imagecheck-image d-none" /> 
                                        </figure>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-8">
                                <div class="form-group">
                                    <label for="content">Blog Content</label>
                                    <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                                    <!-- Quill editor UI -->
                                    <div id="editor" style="height: 250px; background: #fff;">
                                        {!! old('content') !!}
                                    </div>
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
    // Quill setup
    var quill = new Quill('#editor', {
      theme: 'snow',
      placeholder: 'Write your blog here...',
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

    // Load old content into Quill if available
    let oldContent = document.getElementById("content").value;
    if (oldContent) {
      quill.clipboard.dangerouslyPasteHTML(oldContent);
    }

    // Sync Quill content to hidden input before submit
    const form = document.getElementById("blogForm");
    form.addEventListener("submit", function () {
      document.getElementById("content").value = quill.root.innerHTML.trim();
      console.log("Submitting content:", document.getElementById("content").value);
    });

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
    previewImage("img2", "preview2");
  });
</script>

{{-- 
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Quill setup
    var quill = new Quill('#editor', {
      theme: 'snow',
      placeholder: 'Write your blog here...',
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

    // Sync Quill content to hidden input
    const form = document.getElementById("blogForm");
    form.addEventListener("submit", function () {
      document.getElementById("content").value = quill.root.innerHTML.trim();
      console.log("Submitting content:", document.getElementById("content").value);
    });

    // Preview images
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
    previewImage("img2", "preview2");
  });
</script> --}}


{{-- <script>
  document.addEventListener("DOMContentLoaded", function () {
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
    previewImage("img2", "preview2");
  });
</script> --}}
