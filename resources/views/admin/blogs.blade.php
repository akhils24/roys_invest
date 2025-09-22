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
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4" >
            <div class="ms-md-auto py-2 py-md-0">
                <form action="{{ route('admin.addblogs') }}" method="GET" class="mb-3">
                    <button type="submit" class="btn btn-primary btn-round">Add Blogs</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">BLOGS</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-striped table-hover" style="table-layout: auto; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 10%">Title</th>
                                    <th style="width: 15%">Content</th>
                                    <th>Author</th>
                                    <th>Image 1</th>
                                    <th>Image 2</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th style="width: 10%">Title</th>
                                    <th>Content</th>
                                    <th>Author</th>
                                    <th>Image 1</th>
                                    <th>Image 2</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->content }}</td>
                                    <td>{{ $blog->author }}</td>
                                    <td>{{ $blog->image1 }}</td>
                                    <td>{{ $blog->image2 }}</td>
                                    <td>{{ $blog->created_at }}</td>
                                    <td>{{ $blog->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('admin.editblogs',$blog->id) }}" data-bs-toggle="tooltip" title="Edit" class="btn btn-link btn-primary btn-lg"> <i class="fa fa-edit"></i> </a>                                            
                                            @if ($blog->status)
                                                <a href="#" class="btn btn-link btn-danger" data-bs-toggle="tooltip" title="Deactivate" style="padding-top: 15px;"> <i class="fa fa-times"></i> </a>
                                            @else
                                                <a href="#" class="btn btn-link btn-success" data-bs-toggle="tooltip" title="Activate" style="padding-top: 15px;"> <i class="fa fa-check"></i> </a>
                                            @endif
                                        </div>   
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Blogs Found</td>
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

