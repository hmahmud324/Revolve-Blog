<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use App\Models\Author;
use App\Models\Category;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class MyBlogController extends Controller
{
    private $blogs, $blog,$slider_blogs,$featured_blogs,$author;
    public function index()
    {
        return view('website.home.index',[
            'categories'        => Category::all(),
            'featured_blogs'    => $featured_blogs  = Blog::where('featured_status',1)->get(),
            'slider_blogs'      => $slider_blogs    = Blog::where('status',0)->get(),
        ]);
    }

    public function detail($id)
    {
        $author          = Author::where('id', 1)->first();
        $blog            = Blog::find($id);
        $categories      = Category::all();
        // Fetch previous and next blog based on the current blog's ID
        $previousBlog    = Blog::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextBlog        = Blog::where('id', '>', $id)->orderBy('id')->first();

        return view('website.blog.detail', compact('blog', 'categories', 'previousBlog', 'nextBlog','author'));
    }

    public function allBlog()
    {
        return view('website.blog.index', [
            'author'            => Author::where('id',1)->first(),
            'blogs'             => Blog::all(),
            'categories'        => Category::all(),
            ]);
    }

    public function category($id)
    {
        return view('website.category.index', [
            'author'        => Author::where('id',1)->first(),
            'categories'    => Category::all(),
            'blogs'         => Blog::where('category_id', $id)->get()
        ]);
    }

    public function subscribeNewsletter(Request $request)
    {
       $request->validate([
        'email' => ['required', 'email', 'max:255', 'unique:subscribers,email']
       ],[
        'email.unique' => 'frontend.Email is already subscribed!',
       ]);

        $subscriber         = new Subscriber();
        $subscriber->email  = $request->email;
        $subscriber->save();

        return response([
            'status' =>'success',
            'message'=>__('Subscribed successfully') ]);
    }



//,[ 'trending_products' => Blog::where('featured_status', 1)->get(),]
}
