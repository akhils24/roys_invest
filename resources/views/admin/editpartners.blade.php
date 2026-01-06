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
                        <div class="card-title">EDIT PARTNER DETAILS</div>
                    </div>
                    <form method="POST" action="{{ route('admin.editpartners',$partner->id) }}" enctype="multipart/form-data" id="GalleryForm">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="title">Partner Name</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter Partner Name" name="name" value="{{ old('name',$partner->name) }}" required/>
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
                                    <input type="file" class="form-control-file" id="img1" name="image" />
                                    <input type="hidden" name="old_img1" value="{{ $partner->logo }}">
                                    <div class="mt-2">
                                        <img id="preview1" src="{{ $partner->logo ? asset('public_storage/'.$partner->logo) : '' }}" width="150" class="{{ $partner->logo ? '' : 'd-none' }}">
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
