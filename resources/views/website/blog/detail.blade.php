@extends('website.master')

@include('website.includes.header-two')
@notifyCss
@section('body')
    <section class="single-block-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="single-post">
                            <div class="post-body">
                                {!! $blog->description !!}
                            </div>
                            <div class="post-tags py-4">
                                @foreach ($tags as $tag)
                                    <a>{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            <div class="tags-share-box center-box d-flex text-center justify-content-between border-top border-bottom py-3">
                                <span class="single-comment-o"><i class="fa fa-comment-o"></i>0 comment</span>
                                <div class="post-share">
                                    <span class="count-number-like" id="likesCount">2</span>
                                    <a class="penci-post-like single-like-button" onclick="incrementLikes()"><i class="ti-heart"></i></a>
                                </div>
                                <div class="list-posts-share">
                                    <a target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="ti-facebook"></i></a>
                                            <a target="_blank" rel="nofollow" href="https://twitter.com/intent/tweet?text={{$blog->title}}&url={{url()->current()}}
                                                        " target="_blank"><i class="ti-twitter"></i></a>
                                    <a target="_blank" rel="nofollow" href="https://www.pinterest.com/pin/create/button/?url={{url()->current()}}" target="_blank"><i class="ti-pinterest"></i></a>
                                    <a target="_blank" rel="nofollow" href=" https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title={{$blog->title}}" target="_blank"><i class="ti-linkedin"></i></a>
                                </div>  
                            </div>
                        <div class="post-author d-flex my-5">
                            <div class="author-img">
                                <img alt="" src="{{asset('/')}}website/assets/images/author.jpg" class="avatar avatar-100 photo" width="100" height="100">
                            </div>

                            <div class="author-content pl-4">
                                <h4 class="mb-3"><a href="#" title="" rel="author" class="text-capitalize">Themefisher</a></h4>
                                <p>Hey there. My name is Liam. I was born with the love for traveling. I also love taking photos with my phone in order to capture moment..</p>

                                <a target="_blank" class="author-social" href="#"><i class="ti-facebook"></i></a>
                                <a target="_blank" class="author-social" href="#"><i class="ti-twitter"></i></a>
                                <a target="_blank" class="author-social" href="#"><i class="ti-google-plus"></i></a>
                                <a target="_blank" class="author-social" href="#"><i class="ti-instagram"></i></a>
                                <a target="_blank" class="author-social" href="#"><i class="ti-pinterest"></i></a>
                                <a target="_blank" class="author-social" href="#"><i class="ti-tumblr"></i></a>
                            </div>
                        </div>
                        <nav class="post-pagination clearfix border-top border-bottom py-4">
                            <div class="prev-post">
                                @if ($previousBlog)
                                    <a href="{{ route('blog.details', $previousBlog->id) }}">
                                        <span class="text-uppercase font-sm letter-spacing">Next</span>
                                        <h4 class="mt-3">{{ $previousBlog->title }}</h4>
                                    </a>
                                @else
                                    <span class="text-uppercase font-sm letter-spacing">Next</span>
                                    <h4 class="mt-3">No Previous Blog</h4>
                                @endif
                            </div>
                            <div class="next-post">
                                @if ($nextBlog)
                                    <a href="{{ route('blog.details', $nextBlog->id) }}">
                                        <span class="text-uppercase font-sm letter-spacing">Previous</span>
                                        <h4 class="mt-3">{{ $nextBlog->title }}</h4>
                                    </a>
                                @else
                                    <span class="text-uppercase font-sm letter-spacing">Previous</span>
                                    <h4 class="mt-3">No Next Blog</h4>
                                @endif
                            </div>
                        </nav>
                      <div class="related-posts-block mt-5">
                        <h3 class="news-title mb-4 text-center">
                            You May Also Like
                        </h3>
                        <div class="row">
                            @foreach($relatedBlogs as $relatedBlog)
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="post-block-wrapper mb-4 mb-lg-0">
                                    <a href="{{ route('blog.details', ['id' => $relatedBlog->id]) }}">
                                        <img class="img-fluid" src="{{asset($relatedBlog->thumbnail)}}" alt="post-thumbnail"/>
                                    </a>
                                    <div class="post-content mt-3">
                                        <h5>
                                            <a href="{{ route('blog.details',['id' => $relatedBlog->id]) }}">{{ $relatedBlog->title }}</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @auth
                        <div class="comment-area my-5">
                            <h3 class="mb-4 text-center"></h3>
                            @foreach($blog->comments as $comment)
                                    <div class="comment-area-box media">
                                        <img alt="" src="" class="img-fluid float-left mr-3 mt-2 avatar">
                                        <div class="media-body ml-4">
                                            <h4 class="mb-0">{{$comment->user->name}}</h4>
                                            <span class="date-comm font-sm text-capitalize text-color"><i class="ti-time mr-2"></i>{{$comment->created_at->format('M d,Y')}}</span>
                                            <div class="comment-content mt-3">
                                                <p>{{$comment->comment}}</p>
                                            </div>
                                            <div class="comment-meta mt-4 mt-lg-0 mt-md-0">
                                                <a href="#" class="text-underline" data-toggle="modal" data-target="#replyModal">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                     @endauth
                        <form  action="{{route('blog-comment')}}" method="POST" class="comment-form mb-5 gray-bg p-5" id="comment-form">
                            @csrf
                            <h3 class="mb-4 text-center">Leave  a comment</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                    <input type="hidden" name="parent_id" value="">
                                </div>
                            </div>
                            <input class="btn btn-primary" type="submit" name="submit-contact" id="submit_contact" value="Post Comment">
                        </form>
                        </div>
                    </div>
                    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="replyModalLabel">Reply to Comment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="content" rows="3" class="form-control" placeholder="Write your reply"></textarea>
                              </div>
                                 <button type="submit" class="btn btn-primary">Submit Reply</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
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
                                <div class="sidebar-widget mb-5">
                                    <h4 class="text-center widget-title">Trending Posts</h4>

                                    @foreach ($mostViewedBlogs as $blog)
                                        <div class="sidebar-post-item-big">
                                            <a href="{{ route('blog.details', $blog->id) }}">
                                                <img src="{{ asset($blog->thumbnail) }}" alt="" class="img-fluid">
                                            </a>
                                            <div class="mt-3 media-body">
                                                <span class="text-muted letter-spacing text-uppercase font-sm">{{ $blog->created_at->format('F d, Y') }}</span>
                                                <h4><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->title }}</a></h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            <div class="sidebar-widget category mb-5">
                                <h4 class="text-center widget-title">Catgeories</h4>
                                <ul class="list-unstyled">
                                   @foreach($categories as $category)
                                        <li class="align-items-center d-flex justify-content-between">
                                            <a href="{{route('category.index',['id' =>$category->id])}}">{{$category->name}}</a>
                                            <span>{{$category->blogs()->count()}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                             <form action="{{route('subscribe-newsletter')}}" method="POST" class="newsletter-form">
                            @csrf
                            <div class="sidebar-widget subscribe mb-5">
                                  <h4 class="text-center widget-title">Newsletter</h4>
                                  <form>
                                    <div style="text-align: center;">
                                      <input type="text" class="form-control" name="email" placeholder="Email Address">
                                      <button href="" class="btn btn-primary mx-auto mt-3 d-block" type="submit">Sign Up</button>
                                    </div>
                                  </form>
                            </div> 
                            <div class="sidebar-widget sidebar-adv mb-5">
                                <a href="#"><img src="{{asset('/')}}website/assets/images/sidebar-banner3.png" alt="" class="img-fluid w-100"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <x-notify::notify />
        @notifyJs
    </section>
    @include('website.includes.footer-two')
@endsection

