<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Post;

class PhotoController extends Controller
{
    // create
    public function create()
    {
        return view('photos.create');
    }

    public function store(Request $request)
    {
        $photos = new Photo();
        $photos->name = $request->name;
        $photos->image = $request->input('image');
        if(request('image')) {
            $original = request()->file('image')->getClientOriginalName();
            $title = date('Ymd_His'). '_' . $original;
            $request->file('image')->move('storage/images', $title);
            $photos->image= $title;
        }
        $photos->save();

        return redirect()
        ->route('photos.show', compact('photos'));
    }

    public function show(Post $post)
    {
        $photos = Photo::all();
        $posts = Post::all();

        return view('photos.show' , compact('photos','posts'));
    }

    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }

    public function update(Photo $photo, Request $request)
    {
        $photo->name = $request->name;
        $photo->image = $request->input('image');
        if(request('image')) {
            $original = request()->file('image')->getClientOriginalName();
            $title = date('Ymd_His'). '_' . $original;
            $request->file('image')->move('storage/images', $title);
            $photo->image= $title;
        }
        $photo->update();

        return redirect()
        ->route('photos.show', compact('photo'));
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return to_route('photos.show');
    }
}
