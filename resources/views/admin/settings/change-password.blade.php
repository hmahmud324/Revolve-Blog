@extends('admin.master')
@section('title', 'Change Password')
@section('body')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Account Settings
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="row g-0">
                <div class="col-3 d-none d-md-block border-end">
                    <div class="card-body">
                        <div class="list-group list-group-transparent">
                            <a href="{{route('admin.edit')}}"
                                class="list-group-item list-group-item-action d-flex align-items-center">My
                                Account</a>
                            <a href="{{route('admin.change-password')}}"
                                class="list-group-item list-group-item-action d-flex align-items-center">Change
                                Password</a>
                        </div>
                    </div>
                </div>
                <div class="col d-flex flex-column">
                    <form method="post" action="{{route('admin.update-password')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <h3 class="card-title mt-4">Change password</h3>
                            <div class="row g-3">
                                <div class="col-md mb-3">
                                    <div class="form-label">Current Password</div>
                                    <input id="current_password" type="password" name="current_password" class="form-control" required/>
                                    <span class="text-danger">{{$errors->has('current_password') ? $errors->first('current_password') : ' '}}</span>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md mb-3">
                                    <div class="form-label">Password</div>
                                    <input type="password" id="password" name="password" class="form-control" required/>
                                    <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ' '}}</span>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md">
                                    <div class="form-label">Confirm Password</div>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required/>
                                    <span class="text-danger">{{$errors->has('password_confirmation') ? $errors->first('password_confirmation') : ' '}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent mt-auto">
                            <div class="btn-list justify-content-end">
                                <input type="submit" class="btn btn-primary" value="Update" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection