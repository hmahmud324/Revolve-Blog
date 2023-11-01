@extends('admin.master')

@section('body')
    <div class="container">
        <div class="page-header">
            <div>
                <h1 class="page-title">Author Module</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Author</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Author</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">All Author Info</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">SL NO</th>
                                    <th class="wd-15p border-bottom-0">Author Name</th>
                                    <th class="wd-20p border-bottom-0">Image</th>
                                    <th class="wd-20p border-bottom-0">Description</th>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($authors as $author)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$author->name}}</td>
                                        <td><img src="{{asset($author->image)}}" alt="" height="30" width="70"></td>
                                        <td>{{$author->description}}</td>
                                        <td class="d-flex">
                                            <a href="{{route('author.edit', ['id' => $author->id])}}" class="btn btn-success btn-sm me-1">
                                                <i class="fa fa-edit"></i>
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
