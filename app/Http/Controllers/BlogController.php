<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;



class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index',['categories' =>Category::all()]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blogs,title',
        ], [
            'title.required'  => 'Blog title field is required.',
            'title.unique'    => 'Blog title has already been taken.',
        ]);

        $this->blog = Blog::newBlog($request);
        return back()->with('message', 'Blog info saved successfully.');
    }

    public function show($id)
    {
        return view('admin.blog.show', [
            'blog' => Blog::find($id),
        ]);
    }

    public function manage()
    {
        return view('admin.blog.manage', [
            'blogs' => Blog::all(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.blog.edit', [
            'blog'         => Blog::find($id),
            'categories'   => Category::all(),
            'tags'         => Tag::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        Blog::updateBlog($request, $id);
        return redirect('/blog/manage/')->with('message', 'Blog info updated successfully.');
    }

    public function delete($id)
    {
        Blog::deleteBlog($id);
        return redirect('/blog/manage/')->with('message', 'Blog info deleted successfully.');
    }
}
