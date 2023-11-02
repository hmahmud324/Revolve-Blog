@extends('admin.master')

    @notifyCss
@section('body')
   <section>
        <div class="container">
        <div class="page-header">
            <p class="text-center text-success">{{session('message')}}</p>
            <div>
                <h1 class="page-title">Subscribers</h1>
            </div>
        </div>
    </div>
   <div class="container">
       <div class="row row-sm">
           <div class="col-lg-12">
               <div class="card">
                   <div class="card-header border-bottom">
                       <h3 class="card-title">Send mail to Subscribers</h3>
                   </div>
                   <div class="card-body">
                     <form action="{{route('subscriber.store')}}" method="POST">
                        @csrf
                         <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" class="form-control" name="subject"/> 
                            <span class="text-danger">{{$errors->has('subject') ? $errors->first('subject') : ''}}</span>
                         </div>
                         <div class="form-group mt-3">
                            <label for="">Message</label>
                            <textarea class="form-control" name="message" id="summernote"/></textarea> 
                             <span class="text-danger">{{$errors->has('message') ? $errors->first('message') : ''}}</span>
                         </div>
                         <button type="text" class="btn btn-primary mt-3">Send</button>
                     </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>

   <section>
        <div class="container">
        <div class="page-header">
            <div>
                <h1 class="page-title">Subscriber Module</h1>
            </div>
        </div>
    </div>
   <div class="container">
       <div class="row row-sm">
           <div class="col-lg-12">
               <div class="card">
                   <div class="card-header border-bottom">
                       <h3 class="card-title">All Subscriber Info</h3>
                   </div>
                   <div class="card-body">
                       <div class="table-responsive">
                           <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                               <thead>
                               <tr>
                                   <th class="wd-15p border-bottom-0">SL NO</th>
                                   <th class="wd-15p border-bottom-0">Email</th>
                                   <th class="wd-25p border-bottom-0">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach($subs as $sub)
                                   <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$sub->email}}</td>
                                      <td>
                                           <a href="{{route('subscriber.delete', ['id' => $sub->id])}}" onclick="return confirm('Are you sure to delete this..');" class="btn btn-danger btn-sm me-1">
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
</section>

<x-notify::notify />
        @notifyJs
@endsection
