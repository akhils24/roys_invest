@extends('admin.layouts.admin')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Gallery Image</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Image: {{ $image->title }}</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.gallery.images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title *</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $image->title) }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="category_id">Category *</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $image->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="priority">Priority *</label>
                                    <input type="number" class="form-control @error('priority') is-invalid @enderror" id="priority" name="priority" value="{{ old('priority', $image->priority) }}" min="0" required>
                                    <small class="form-text text-muted">Priority 1-10 shows on homepage</small>
                                    <!-- ADD ERROR DISPLAY -->
                                    @error('priority')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        <option value="1" {{ $image->is_active ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$image->is_active ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $image->description) }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="image_file">Image</label>
                                    <input type="file" class="form-control" id="image_file" name="image_file" accept="image/*">
                                    <small class="form-text text-muted">Current image:</small>
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Update Image</button>
                            <a href="{{ route('admin.gallery') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection