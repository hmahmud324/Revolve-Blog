<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
        ], [
            'name.required'  => 'Category name field is required.',
            'name.unique'    => 'Category name has already been taken.',
        ]);

        Category::newCategory($request);
        return back()->with('message', 'Category info created successfully.');
    }

    public function manage()
    {
        return view('admin.category.manage', [
            'categories' => Category::all(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.category.edit', [
            'category' => Category::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/category/manage/')->with('message', 'Category info updated successfully.');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('/category/manage/')->with('message', 'Category info deleted successfully.');
    }
}
