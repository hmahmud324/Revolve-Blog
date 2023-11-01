<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorProfileController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.author-profile.index', compact('authors'));
    }

    public function create(Request $request)
    {
        Author::newAuthor($request);
        return back()->with('message', 'Author info created successfully.');
    }

    public function manage()
    {
        return view('admin.author-profile.manage', ['authors' => Author::all()]);
    }

    public function edit($id)
    {
        return view('admin.author-profile.edit',['author' => Author::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Author::updateAuthor($request,$id);
        return redirect('/author/manage/')->with('message', 'Author info updated successfully.');
    }
}

