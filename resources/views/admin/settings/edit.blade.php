@extends('admin.master')
@section('title', 'Edit Profile')
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
              <a href=""
                class="list-group-item list-group-item-action d-flex align-items-center">My
                Account</a>
              <a href="{{route('admin.change-password')}}"
                class="list-group-item list-group-item-action d-flex align-items-center">Change
                Password</a>
            </div>
          </div>
        </div>
        <div class="col d-flex flex-column">
          <form method="post" action="{{ route('admin.update',['id' => $editProfile->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <h2 class="mb-4">My Account</h2>
              <h3 class="card-title">Profile Details</h3>
              <div class="row align-items-center">
                <div class="col-auto">
                  <img src="{{ asset($editProfile->image) }}" width="100"
                    class="img-thumbnail" />
                </div>
                <div class="col-auto">
                  <input type="file" name="image" />
                </div>
              </div>
              <h3 class="card-title mt-4">Business Profile</h3>
              <div class="row g-3">
                <div class="col-md">
                  <div class="form-label">Name</div>
                  <input type="text" name="name" class="form-control" value="{{  $editProfile->name }}" required='true'>
                </div>
                <div class="col-md">
                  <div class="form-label">Email: </div>
                  <input type="email" name="email" class="form-control" value="{{  $editProfile->email }}" required='true'>
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
