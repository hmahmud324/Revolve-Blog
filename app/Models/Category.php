<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    private static $category;

    public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name           = $request->name;
        self::$category->slug           = Str::slug($request->name);
        self::$category->description    = $request->description;
        self::$category->save();
    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        self::$category->name           = $request->name;
        self::$category->slug           = Str::slug($request->name);
        self::$category->description    = $request->description;
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        self::$category->delete();
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

}
