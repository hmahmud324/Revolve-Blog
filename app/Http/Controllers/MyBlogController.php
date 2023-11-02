<?php

namespace App\Http\Controllers;



use App\Models\Tag;
use App\Models\Blog;
use App\Models\Author;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class MyBlogController extends Controller
{
    private $blogs, $blog,$slider_blogs,$featured_blogs,$author,$relatedBlogs,$tags;
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
        $tags           = Tag::all();
        $author         = Author::where('id', 1)->first();
        $blog           = Blog::find($id);
        $categories     = Category::all();
        $category       = Category::find($blog->category_id);
        $comments       = Comment::all();
        // Increment the views for the current blog
        $blog->incrementViews();

        // Fetch the most viewed blogs
        $mostViewedBlogs = Blog::orderBy('views', 'desc')->take(3)->get();

        // Fetch related blogs
        $relatedBlogs    = Blog::where('category_id', $category->id)
            ->where('id', '!=', $id)
            ->take(3)
            ->get();

        // Fetch previous and next blogs based on the current blog's ID
        $previousBlog   = Blog::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextBlog       = Blog::where('id', '>', $id)->orderBy('id')->first();

        return view('website.blog.detail', compact('blog', 'categories', 'mostViewedBlogs', 'previousBlog', 'nextBlog', 'author', 'relatedBlogs','tags','comments'));
    }

    public function search(Request $request)
    {
        $author         = Author::where('id', 1)->first();
        $categories     = Category::all();
        $query          = $request->input('query');

        $blogs          = Blog::query();

        if ($query) {
            $blogs->where('title', 'like', '%'.$query.'%')
                  ->orWhere('description', 'like', '%'.$query.'%');
        }

        $blogs         = $blogs->get();

        return view('website.search.index', compact('blogs','author','categories'));
    }

    public function allBlog()
    {
        $blogs          = Blog::query()->paginate(4);
        $author         = Author::where('id', 1)->first();
        $categories     = Category::all();

    return view('website.blog.index', compact('blogs', 'author', 'categories'));
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
        'email'        => ['required', 'email', 'max:255', 'unique:subscribers,email']
       ],[
        'email.unique' => 'frontend.Email is already subscribed!',
       ]);

        $subscriber         = new Subscriber();
        $subscriber->email  = $request->email;
        $subscriber->save();

        return response([
            'status'  =>'success',
            'message' =>__('Subscribed successfully') ]);
    }

    public function mostViews()
    {
        $mostViewedBlogs = Blog::mostViewed(3)->get();
        return view('website.blog.detail', compact('mostViewedBlogs'));
    }


     public function handleComment(Request $request)
    {

        $request->validate([
            'comment' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->blog_id      = $request->blog_id;
        $comment->user_id      = Auth::user()->id;
        $comment->parent_id    = $request->parent_id;
        $comment->comment      = $request->comment;
        $comment->save();
       drakify('success');
        return redirect()->back();
    }

     public function handleReply(Request $request)
    {

        $request->validate([
            'replay' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->reply;
        $comment->save();
       drakify('success');
        return redirect()->back();
    }

}
