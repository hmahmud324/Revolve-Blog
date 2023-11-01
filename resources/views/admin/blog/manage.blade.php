@extends('admin.master')

@section('body')
    <div class="container">
        <div class="page-header">
            <div>
                <h1 class="page-title">Blog Module</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Blog</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">All Blog Info</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">SL NO</th>
                                    <th class="wd-15p border-bottom-0">Category Name</th>
                                    <th class="wd-15p border-bottom-0">Title</th>
                                    <th class="wd-20p border-bottom-0">Thumbnail</th>
                                    <th class="wd-10p border-bottom-0">Status</th>
                                    <th class="wd-25p border-bottom-0">Featured Status</th>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$blog->category->name}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td><img src="{{asset($blog->thumbnail)}}" alt="" height="30" width="70"></td>
                                        <td>{{$blog->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        <td>{{$blog->featured_status == 1 ? 'Featured' : 'Not Featured'}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('blog.edit', ['id' => $blog->id])}}" class="btn btn-success btn-sm me-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('blog.delete', ['id' => $blog->id])}}" onclick="return confirm('Are you sure to delete this..');" class="btn btn-danger btn-sm me-1">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
