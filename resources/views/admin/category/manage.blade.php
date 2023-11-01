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
                    <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
                </ol>
            </div>
        </div>
    </div>
   <div class="container">
       <div class="row row-sm">
           <div class="col-lg-12">
               <div class="card">
                   <div class="card-header border-bottom">
                       <h3 class="card-title">All Category Info</h3>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                               <thead>
                               <tr>
                                   <th class="wd-15p border-bottom-0">SL NO</th>
                                   <th class="wd-15p border-bottom-0">Name</th>
                                   <th class="wd-20p border-bottom-0">Description</th>
                                   <th class="wd-10p border-bottom-0">Status</th>
                                   <th class="wd-25p border-bottom-0">Featured Status</th>
                                   <th class="wd-25p border-bottom-0">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach($categories as $category)
                                   <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$category->name}}</td>
                                       <td>{{$category->description}}</td>
                                       <td>{{$category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                       <td>{{$category->featured_status == 1 ? 'Featured' : 'Not Featured'}}</td>
                                       <td class="d-flex">
                                           <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-success btn-sm me-1">
                                               <i class="fa fa-edit"></i>
                                           </a>
                                           <a href="{{route('category.delete', ['id' => $category->id])}}" onclick="return confirm('Are you sure to delete this..');" class="btn btn-danger btn-sm me-1">
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
