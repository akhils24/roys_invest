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
                <form action="{{ route('admin.add_gallery_category') }}" method="GET" class="mb-3">
                    <button type="submit" class="btn btn-primary btn-round">Add Category</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">GALLERY CATEGORIES</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-striped table-hover" style="table-layout: auto; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Display Order</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Display Order</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description ?? '-' }}</td>
                                            <td>{{ $category->display_order }}</td>
                                            <td>{{ $category->is_active ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    {{-- EDIT BUTTON --}}
                                                    <a href="{{ route('admin.gallery.categories.edit',$category->id) }}" data-bs-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-lg"> 
                                                        <i class="fa fa-edit"></i> 
                                                    </a>
                                                    
                                                    {{-- TOGGLE BUTTONS - CHANGED TO REGULAR LINKS --}}
                                                    @if ($category->is_active)
                                                        <a href="{{ route('admin.toggle_category',$category->id) }}" 
                                                           class="btn btn-link btn-danger" 
                                                           data-bs-toggle="tooltip" 
                                                           title="Deactivate" 
                                                           style="padding-top: 15px;"> 
                                                            <i class="fa fa-times"></i> 
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admin.toggle_category',$category->id) }}" 
                                                           class="btn btn-link btn-success" 
                                                           data-bs-toggle="tooltip" 
                                                           title="Activate" 
                                                           style="padding-top: 15px;"> 
                                                            <i class="fa fa-check"></i> 
                                                        </a>
                                                    @endif
                                                </div>   
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Categories Found</td>
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