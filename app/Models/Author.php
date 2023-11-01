<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    private static $author, $image, $imageName, $directory, $imageUrl;

    public static function imageUpload($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = 'uploads/author-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newAuthor($request)
    {
        self::$imageUrl = self::imageUpload($request);

        self::$author = new Author();
        self::$author->name           = $request->name;
        self::$author->image          = self::$imageUrl;
        self::$author->type           = $request->type;
        self::$author->description    = $request->description;
        self::$author->save();
    }

    public static function updateAuthor($request, $id)
    {
        self::$author = Author::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$author->image))
            {
                unlink(self::$author->image);
            }
            self::$imageUrl = self::imageUpload($request);
        }
        else
        {
            self::$imageUrl = self::$author->image;
        }

        self::$author->name           = $request->name;
        self::$author->image          = self::$imageUrl;
        self::$author->type           = $request->type;
        self::$author->description    = $request->description;
        self::$author->save();
    }

}
