<div class="header-logo py-5 d-none d-lg-block">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <a class="navbar-brand" href="index.html"><img src="{{asset('/')}}website/assets/images/logo.png" alt="" class="img-fluid w-100"></a>
        </div>
    </div>
</div>
</div>

<header class="header-top bg-grey justify-content-center">
    <nav class="navbar navbar-expand-lg navigation">
        <div class="container">
            <a class="navbar-brand d-lg-none" href="index.html"><img src="{{asset('/')}}website/assets/images/logo.png" alt="" class="img-fluid"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul id="menu" class="menu navbar-nav ">
                    <li class="nav-item dropdown  pl-0">
                        <a class="nav-link" href="{{route('home')}}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('blog.index')}}">
                            Blog Posts
                        </a>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                                     id="navbarDropdown2" role="button" data-toggle="dropdown"
                                                     aria-haspopup="true" aria-expanded="false">Category</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            @foreach ($categories as $category )
                                <a class="dropdown-item" href="{{route('category.index',['id' => $category->id])}}">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{route('about.index')}}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{route('contact.index')}}" class="nav-link">Contact</a></li>
                    <li class="nav-item d-lg-none"><div class="search_toggle p-3 d-inline-block bg-white"><i class="ti-search"></i></div></li>
                </ul>
            </div>
            <div class="text-right search d-none d-lg-block">
                <div class="search_toggle"><i class="ti-search"></i></div>
            </div>
        </div>
    </nav>

</header>
<!--search overlay start-->
<div class="search-wrap">
    <div class="overlay">
        <form action="#" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <input type="text" class="form-control" placeholder="Search..."/>
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <i class="ti-close"></i>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--search overlay end-->
