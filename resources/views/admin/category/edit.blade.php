@extends('admin.master')

@section('body')
    <div class="container">
        <div class="page-header">
            <div>
                <h1 class="page-title">Category Module</h1>
            </div>
            <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Edit Category Form</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">{{session('message')}}</p>
                        <form class="form-horizontal" action="{{route('category.update', ['id' => $category->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <label for="firstName" class="col-md-3 form-label">Category Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="firstName" value="{{$category->name}}" placeholder="Category Name" name="name" type="text"/>
                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="Slug" class="col-md-3 form-label">Category Slug</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="Slug" value="{{$category->slug}}" placeholder="Category Slug" name="slug" type="text"/>
                                    <span class="text-danger">{{$errors->has('slug') ? $errors->first('slug') : ''}}</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="lastName" class="col-md-3 form-label">Category Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="lastName" placeholder="Category Description" name="description">{{$category->description}}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Update Category Info</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

