@include('website.includes.style')
<section class="slider mt-4">
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($slider_blogs->chunk(3) as $key => $chunk)
            <div class="carousel-item @if($key == 0) active @endif">
                <div class="row">
                    @foreach($chunk as $slider_blog)
                    <div class="col-md-4">
                        <div class="slider-item">
                            <div class="slider-item-content">
                                <div class="post-thumb mb-4">
                                    <a href="blog-single.html">
                                        <img src="{{$slider_blog->thumbnail}}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="slider-post-content">
                                    <a class="cat-name text-color font-sm font-extra text-uppercase letter-spacing" href="{{route('category.index',['id'=>$slider_blog->category->id])}}">{{$slider_blog->category->name}}</a>
                                    <h3 class="post-title mt-1"><a href="{{route('blog.details',['id' => $slider_blog->id])}}">{{$slider_blog->title}}</a></h3>
                                    <span class="text-muted text-capitalize">{{$slider_blog->created_at->format('M d, Y')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

@include('website.includes.scripts')