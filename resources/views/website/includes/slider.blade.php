<section class="slider mt-4">
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-lg-12 col-sm-12 col-md-12 slider-wrap">
                @foreach($slider_blogs as $slider_blog)
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
                            <span class=" text-muted  text-capitalize">{{$slider_blog->created_at->format(' M d , Y ')}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
