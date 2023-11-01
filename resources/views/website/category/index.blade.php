@extends('website.master')

@include('website.includes.header-two')
@section('body')
    <section class="section-padding">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-left">
                            @php
                                $previousCategory = null;
                            @endphp
                            @foreach($blogs as $blog)
                                @if($previousCategory !== $blog->category->name)
                                    <h1 class="lg-title">{{ $blog->category->name }}</h1>
                                    @php
                                        $previousCategory = $blog->category->name;
                                    @endphp
                                @endif
                            <!-- Display the blog content here -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-lg-6 col-md-6">
                            <article class="post-grid mb-5">
                                <div class="post-thumb mb-4">
                                    <img src="{{asset($blog->thumbnail)}}" alt="" class="img-fluid w-100">
                                </div>
                                <span class="cat-name text-color font-extra text-sm text-uppercase letter-spacing-1">{{$blog->category->name}}</span>
                                <h3 class="post-title mt-1"><a href="{{route('blog.details',['id' => $blog->id])}}">{{$blog->title}}</a></h3>
                                <span class=" text-muted  text-capitalize">{{$blog->created_at->format('M d, Y')}}</span>
                            </article>
                        </div>
                        @endforeach
                    </div>

                    <div class="pagination mt-5 pt-4">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#" class="active">1</a></li>
                            <li class="list-inline-item"><a href="#">2</a></li>
                            <li class="list-inline-item"><a href="#">3</a></li>
                            <li class="list-inline-item"><a href="#" class="prev-posts"><i class="ti-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        <div class="sidebar-wrap mt-5 mt-lg-0">
                            <div class="sidebar-widget about mb-5 text-center p-3">
                                <div class="about-author">
                                    <img src="{{asset($author->image)}}" alt="" class="img-fluid">
                                </div>
                                <h4 class="mb-0 mt-4">{{$author->name}}</h4>
                                <p>{{$author->type}}</p>
                                <p>{!! $author->description !!}</p>
                            </div>
                            <div class="sidebar-widget follow mb-5 text-center">
                                <h4 class="text-center widget-title">Follow Me</h4>
                                <div class="follow-socials">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#" ><i class="ti-twitter"></i></a>
                                    <a href="#" ><i class="ti-instagram"></i></a>
                                    <a href="#"><i class="ti-youtube"></i></a>
                                    <a href="#"><i class="ti-pinterest"></i></a>
                                </div>
                            </div>

                            <div class="sidebar-widget mb-5 ">
                                <h4 class="text-center widget-title">Trending Posts</h4>

                                <div class="sidebar-post-item-big">
                                    <a href="blog-single.html"><img src="{{asset('/')}}website/assets/images/news/img-1.jpg" alt="" class="img-fluid"></a>
                                    <div class="mt-3 media-body">
                                        <span class="text-muted letter-spacing text-uppercase font-sm">September 10, 2019</span>
                                        <h4 ><a href="blog-single.html">Meeting With Clarissa, Founder Of Purple Conversation App</a></h4>
                                    </div>
                                </div>

                                <div class="media border-bottom py-3 sidebar-post-item">
                                    <a href="#"><img class="mr-4" src="{{asset('/')}}website/assets/images/news/thumb-1.jpg" alt=""></a>
                                    <div class="media-body">
                                        <span class="text-muted letter-spacing text-uppercase font-sm">September 10, 2019</span>
                                        <h4 ><a href="blog-single.html">Thoughtful living in los Angeles</a></h4>
                                    </div>
                                </div>

                                <div class="media py-3 sidebar-post-item">
                                    <a href="#"><img class="mr-4" src="{{asset('/')}}website/assets/images/news/thumb-2.jpg" alt=""></a>
                                    <div class="media-body">
                                        <span class="text-muted letter-spacing text-uppercase font-sm">September 10, 2019</span>
                                        <h4 ><a href="blog-single.html">Vivamus molestie gravida turpis.</a></h4>
                                    </div>
                                </div>
                            </div>


                            <div class="sidebar-widget category mb-5">
                                <h4 class="text-center widget-title">Catgeories</h4>
                                <ul class="list-unstyled">
                                    @foreach($categories as $category)
                                        <li class="align-items-center d-flex justify-content-between">
                                            <a href="#">{{$category->name}}</a>
                                            <span>{{$category->blogs()->count()}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                           <form action="{{route('subscribe-newsletter')}}" method="POST" class="newsletter-form">
                            @csrf
                                 <div class="sidebar-widget subscribe mb-5">
                                <h4 class="text-center widget-title">Newsletter</h4>
                                <input type="text" class="form-control" name="email" placeholder="Email Address">
                                <button href="" class="btn btn-primary d-block mt-3 news-button" type="submit">Sign Up</a>
                                </div>
                            </form>     
                            <div class="sidebar-widget sidebar-adv mb-5">
                                <a href="#"><img src="{{asset('/')}}website/assets/images/sidebar-banner3.png" alt="" class="img-fluid w-100"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('website.includes.footer-two')
@endsection
