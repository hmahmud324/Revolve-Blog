<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory,SoftDeletes;

    private static $blog, $thumbnail, $imageName, $directory, $imageUrl;

    public static function imageUpload($request)
    {
        self::$thumbnail = $request->file('thumbnail');
        self::$imageName = self::$thumbnail->getClientOriginalName();
        self::$directory = 'uploads/blog-images/';
        self::$thumbnail->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newBlog($request)
    {
        self::$imageUrl = self::imageUpload($request);

        self::$blog = new Blog();
        self::$blog->title          = $request->title;
        self::$blog->category_id    = $request->category_id;
        self::$blog->author_id      = Auth::user()->id;
        self::$blog->slug           = Str::slug($request->title);
        self::$blog->description    = $request->description;
        self::$blog->thumbnail      = self::$imageUrl;
        self::$blog->save();

        $tags = explode(',', $request->tags);
        $tagIds = [];

        foreach ($tags as $tag) {
        $item = new Tag();
        $item->name = $tag;
        $item->save();

        $tagIds[] = $item->id;
    }

    // Associate the tags with the blog
    self::$blog->tags()->attach($tagIds);   
    }

    public static function updateBlog($request, $id)
    {
        self::$blog = Blog::find($id);
        if ($request->file('thumbnail'))
        {
            if (file_exists(self::$blog->thumbnail))
            {
                unlink(self::$blog->thumbnail);
            }
            self::$imageUrl = self::imageUpload($request);
        }
        else
        {
            self::$imageUrl = self::$blog->thumbnail;
        }

        self::$blog->title          = $request->title;
        self::$blog->category_id    = $request->category_id;
        self::$blog->author_id      = Auth::user()->id;
        self::$blog->slug           = Str::slug($request->title);
        self::$blog->description    = $request->description;
        self::$blog->thumbnail      = self::$imageUrl;
        self::$blog->save();
    }

    public static function deleteBlog($id)
    {
        self::$blog = Blog::find($id);
        if (file_exists(self::$blog->thumbnail))
        {
            unlink(self::$blog->thumbnail);
        }
        self::$blog->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function incrementViews()
    {
        $this->views++;
        $this->save();
    }

    public function scopeMostViewed($query, $limit = 3)
    {
        return $query->orderBy('views', 'desc')->take($limit);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'blogs_tags');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
