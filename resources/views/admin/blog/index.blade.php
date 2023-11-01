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
                    <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Add Blog Form</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">{{session('message')}}</p>
                        <form class="form-horizontal" action="{{route('blog.new')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">Category Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" required name="category_id">
                                        <option disabled selected>-- Select Blog Category --</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">Blog Title</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="firstName" placeholder="Blog title" name="title" type="text"/>
                                    <span class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">Blog Slug</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="firstSlug" placeholder="Blog Slug" name="slug" type="text"/>
                                    <span class="text-danger">{{$errors->has('slug') ? $errors->first('slug') : ''}}</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="lastName" class="col-md-3 form-label">Blog Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="summernote" placeholder="Blog Description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="thumbnail" class="col-md-3 form-label">Blog Thumbnail</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="thumbnail" type="file" name="thumbnail"/>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Create New Blog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
