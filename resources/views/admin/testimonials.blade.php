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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">TESTIMONIALS</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-striped table-hover" style="table-layout: auto; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                 <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($testimonials as $testimonial)
                                <tr>
                                    <td>{{ $testimonial->id }}</td>
                                    <td>{{ $testimonial->author_name }}</td>
                                    <td>{{ $testimonial->rating }}</td>
                                    <td>{{ $testimonial->text }}</td>
                                    <td>{{ $testimonial->google_relative_time ?? $testimonial->created_at->diffForHumans() }}</td>
                                    <td>{{ $testimonial->approved==1 ? 'Approved' : 'Declined' }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            @if (! $testimonial->approved)
                                                <a href="{{ route('admin.statustestimonial',$testimonial->id) }}" class="btn btn-link btn-success" datacontactoggle="tooltip" title="Approve" style="padding-top: 15px;"> <i class="fa fa-check"></i> </a>
                                            @else
                                                <a href="{{ route('admin.statustestimonial',$testimonial->id) }}" class="btn btn-link btn-danger" datacontactoggle="tooltip" title="Decline" style="padding-top: 15px;"> <i class="fa fa-times"></i> </a>
                                            @endif
                                        </div>   
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Testimonials Found</td>
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

