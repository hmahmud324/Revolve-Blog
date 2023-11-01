@extends('admin.master')

@section('body')
    <div class="container">
        <div class="page-header">
            <div>
                <h1 class="page-title">Author Profile Module</h1>
            </div>
        </div>
    </div>
    <form action="{{route('author.new')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Profile Image</label>
                        <input class="form-control" id="image" type="file" name="image">
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="Enter type">
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter description"></textarea>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <button class="btn btn-primary" type="submit">Create Author Info</button>
                </div>
            </div>
        </div>
    </form>
@endsection
