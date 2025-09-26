@extends('admin.layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gallery Management</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> Add New Image
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-check"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-ban"></i> {{ session('error') }}
                </div>
            @endif

            <div class="row">
                @foreach($galleries as $gallery)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                             class="card-img-top" 
                             alt="{{ $gallery->title }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title">{{ Str::limit($gallery->title, 30) }}</h6>
                            <p class="card-text small text-muted">
                                {{ Str::limit($gallery->description, 50) }}
                            </p>
                            <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Added: {{ $gallery->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($galleries->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No images in gallery yet</h4>
                <p class="text-muted">Add your first image to get started</p>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add First Image
                </a>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection