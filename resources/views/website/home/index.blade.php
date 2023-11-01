@extends('website.master')

@include('website.includes.main-header')
@include('website.includes.slider')
@section('body')

<section>
     <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-left">
                        <h1 class="lg-title">Featured Blogs</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        @foreach($featured_blogs as $featured_blog)
                        <div class="col-lg-3 col-md-6">
                            <article class="post-grid mb-5">
                                <a class="post-thumb mb-4 d-block" href="">
                                    <img src="{{asset($featured_blog->thumbnail)}}" alt="" class="img-fluid w-100">
                                </a>
                                <a class="cat-name text-color font-sm font-extra text-uppercase letter-spacing" href="{{route('category.index',['id'=>$featured_blog->category->id])}}">{{$featured_blog->category->name}}</a>
                                <h3 class="post-title mt-1"><a href="{{route('blog.details',['id' => $featured_blog->id])}}">{{$featured_blog->title}}</a></h3>
                                <span class="text-muted letter-spacing text-uppercase font-sm">{{$featured_blog->created_at->format('M d,Y ')}}</span>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="m-auto">
                    <div class="pagination mt-5 pt-4">
                        <ul class="list-inline ">
                            <li class="list-inline-item"><a href="#" class="active">1</a></li>
                            <li class="list-inline-item"><a href="#">2</a></li>
                            <li class="list-inline-item"><a href="#">3</a></li>
                            <li class="list-inline-item"><a href="#" class="prev-posts"><i class="ti-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('website.includes.footer')
@endsection

