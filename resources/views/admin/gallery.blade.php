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
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div class="ms-md-auto py-2 py-md-0">
                <form action="{{ route('admin.addgallery') }}" method="GET" class="mb-3">
                    <button type="submit" class="btn btn-primary btn-round">Add Image</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">GALLERY IMAGES</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-striped table-hover" style="table-layout: auto; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>ID</th>
                                        <th style="width: 15%">Title</th>
                                        <th style="width: 15%">Category</th>
                                        <th>Priority</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Priority</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($gallery_images as $image)
                                        <tr>
                                            <!-- Image Thumbnail -->
                                            <td>
                                                <img src="{{ asset('storage/' . $image->image_path) }}" 
                                                     alt="{{ $image->title }}" 
                                                     style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px; border: 1px solid #dee2e6;">
                                            </td>
                                            <td>{{ $image->id }}</td>
                                            <td>{{ $image->title }}</td>
                                            <td>{{ $image->category->name }}</td>
                                            <td>
                                                @if($image->priority == -1)
                                                    <span class="badge bg-secondary">N/A</span>
                                                @else
                                                    {{ $image->priority }}
                                                    @if($image->priority <= 10 && $image->is_active)
                                                        <span class="badge bg-info" data-bs-toggle="tooltip" title="Featured on homepage">★</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>{{ $image->created_at->format('M d, Y') }}</td>
                                            <td>
                                                @if($image->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('admin.gallery.images.edit', $image->id) }}" 
                                                       class="btn btn-link btn-primary" 
                                                       data-bs-toggle="tooltip" 
                                                       title="Edit Image"
                                                       style="padding-top: 15px;">
                                                        <i class="fa fa-edit"></i> 
                                                    </a>
                                                    
                                                    <!-- Toggle Active/Inactive -->
                                                    @if ($image->is_active)
                                                        <a href="{{ route('admin.toggle_image',$image->id) }}" 
                                                           class="btn btn-link btn-warning" 
                                                           data-bs-toggle="tooltip" 
                                                           title="Deactivate" 
                                                           style="padding-top: 15px;"> 
                                                            <i class="fa fa-eye-slash"></i> 
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admin.toggle_image',$image->id) }}" 
                                                           class="btn btn-link btn-success" 
                                                           data-bs-toggle="tooltip" 
                                                           title="Activate" 
                                                           style="padding-top: 15px;"> 
                                                            <i class="fa fa-eye"></i> 
                                                        </a>
                                                    @endif
                                                </div>   
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No Images Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection